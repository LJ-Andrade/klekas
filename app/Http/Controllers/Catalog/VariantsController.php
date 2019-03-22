<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatalogArticle;
use App\CatalogVariant;

class VariantsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */
    
 

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.catalog.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:4|max:250|unique:catalog_tags',
        ],[
            'name.required' => 'Debe ingresar un nombre a la etiqueta',
            'name.unique'   => 'La etiqueta ya existe',
        ]);

        $Tag = new CatalogTag($request->all());
        $Tag->save();

        return redirect()->route('cat_tags.index')->with('message','Etiqueta creada');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $tag = CatalogTag::find($id);
        return view('vadmin.catalog.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $tag = CatalogTag::find($id);

        $this->validate($request,[
            'name' => 'required|min:4|max:250|unique:catalog_tags,name,'.$tag->id,
        ],[
            'name.required' => 'Debe ingresar un nombre a la etiqueta',
            'name.unique'   => 'La etiqueta ya existe'
        ]);
        
        $tag->fill($request->all());
        $tag->save();

        return redirect()->route('cat_tags.index')->with('message','Etiqueta editada');
    } 

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request)
        {
        //$ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
        try 
        {
            $record = CatalogVariant::find($request->id);
            $record->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item eliminado correctamente'
            ]);
        } 
        catch (\Exception $e) 
        {
            return response()->json([
                'success' => false,
                'message' => 'Error: '.$e
            ]);    
        }
    }
} // End