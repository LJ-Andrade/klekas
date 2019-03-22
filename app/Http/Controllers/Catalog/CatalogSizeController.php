<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;;
use App\CatalogSize;

class CatalogSizeController extends Controller
{
    // routeGroup: 
    // viewName:   catalog-size
    // crudName:   CatalogSize
    // crudNameSingular: CatalogSize

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {   
        $name = $request->get('name');

        if(isset($name)){
            $size = CatalogSize::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $size = CatalogSize::orderBy('id','ASC')->paginate(15);
        }
        return view('vadmin.catalog.sizes.index')->with('size', $size);    
    }

    public function show($id)
    {
        $CatalogSize = CatalogSize::findOrFail($id);
        return view('vadmin.catalog.sizes.show', compact('CatalogSize'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.catalog.sizes.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|max:10|unique:catalog_sizes',
        ],[
            'name.required' => 'Debe ingresar un talle',
            'name.max'      => 'Se permiten 10 caracteres máximo',
            'name.unique'   => 'El talle ya existe',
        ]);

        $item = new CatalogSize($request->all());
        $item->save();

        return redirect()->route('cat_sizes.index')->with('message','Talle creado');

    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $item = CatalogSize::findOrFail($id);
        return view('vadmin.catalog.sizes.edit')->with('item', $item);
    }

    public function update($id, Request $request)
    { 
        $item = CatalogSize::find($id);

        $this->validate($request,[
            'name'          => 'required|max:10|unique:catalog_sizes,name,'.$item->id,
        ],[
            'name.required' => 'Debe ingresar un nombre',
            'name.unique'   => 'El item ya existe'
        ]);
        
        $item->fill($request->all());
        $item->save();

        return redirect()->route('cat_sizes.index')->with('message','Talle actualizado');
    }

    public function updateField(Request $request)
    {
        $article = CatalogSize::find($request->id);
        $article->{$request->field} = $request->value;
        
        try {
            $article->save();
            return response()->json([
                "response" => "success",
                "action"   => $request->action
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "response" => "error",
                "message"  => $e->getMessage()
            ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request)
    {   
        $ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
        try {
            foreach ($ids as $id) {
                $record = CatalogSize::find($id);
                $record->delete();
            }
            return response()->json([
                'success'   => true,
            ]); 
        }  catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'error'    => 'Error: '.$e->getMessage()
            ]);    
        }
    }

}
