<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\CatalogCategory;

class CategoriesController extends Controller
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
            $categories = CatalogCategory::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $categories = CatalogCategory::orderBy('id','ASC')->paginate(15);
        }

        return view('vadmin.catalog.categories.index')->with('categories', $categories);
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
        return view('vadmin.catalog.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:4|max:250|unique:catalog_categories',
        ],[
            'name.required' => 'Debe ingresar un nombre a la categoría',
            'name.unique'   => 'La categoría ya existe',
        ]);

        $category = new CatalogCategory($request->all());
        $category->save();
        
        return redirect()->route('cat_categorias.index')->with('message','Categoría creada');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $category = CatalogCategory::find($id);
        return view('vadmin.catalog.categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = CatalogCategory::find($id);

        $this->validate($request,[
            'name'          => 'required|min:4|max:250|unique:catalog_categories,name,'.$category->id,
        ],[
            'name.required' => 'Debe ingresar un nombre a la categoría',
            'name.unique'   => 'La categoría ya existe'
        ]);
        
        $category->fill($request->all());
        $category->save();

        return redirect()->route('cat_categorias.index')->with('message','Categoría editada');
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
                    $record = CatalogCategory::find($id);
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
                $record = CatalogCategory::find($id);
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
