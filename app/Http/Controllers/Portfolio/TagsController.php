<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;

class TagsController extends Controller
{
 /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */
    
    public function index(Request $request)
    {   
        $name = $request->get('name');

        if(isset($name)){
            $tags = Tag::searchname($name)->orderBy('name', 'ASC')->paginate(15); 
        } else {
            $tags = Tag::orderBy('name','ASC')->paginate(15);
        }

        return view('vadmin.portfolio.tags.index')->with('tags', $tags);
    }

    public function show($id)
    {
        //
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.portfolio.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:4|max:250|unique:tags',
        ],[
            'name.required' => 'Debe ingresar un nombre a la etiqueta',
            'name.unique'   => 'La etiqueta ya existe',
        ]);

        $Tag = new Tag($request->all());
        $Tag->save();

        return redirect()->route('tags.index')->with('message','Etiqueta creada');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('vadmin.portfolio.tags.edit')->with('tag', $tag);

    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $this->validate($request,[
            'name' => 'required|min:4|max:250|unique:tags,name,'.$tag->id,
        ],[
            'name.required' => 'Debe ingresar un nombre a la etiqueta',
            'name.unique'   => 'La etiqueta ya existe'
        ]);
        
        $tag->fill($request->all());
        $tag->save();

        return redirect()->route('tags.index')->with('message','Etiqueta editada');
    } 

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request)
    {   
        
        $ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
        
        if(is_array($ids)) {
            try {
                foreach ($ids as $id) {
                    $record = Tag::find($id);
                    $record->delete();
                }
                return response()->json([
                    'success'   => true,
                ]); 
            }  catch (\Exception $e) {
                return response()->json([
                    'success'   => false,
                    'error'    => 'Error: '.$e
                ]);    
            }
        } else {
            try {
                $record = Tag::find($id);
                $record->delete();
                    return response()->json([
                        'success'   => true,
                    ]);  
                    
                } catch (\Exception $e) {
                    return response()->json([
                        'success'   => false,
                        'error'    => 'Error: '.$e
                    ]);    
                }
        }
    }
} // End
