<?php

namespace App\Http\Controllers\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatalogBrand;

class BrandController extends Controller
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
            $items = CatalogBrand::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $items = CatalogBrand::orderBy('id','ASC')->paginate(15);
        }

        return view('vadmin.catalog.brands.index')->with('items', $items);
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
        return view('vadmin.catalog.brands.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required|min:4|max:250|unique:catalog_brands',
        ],[
            'name.required' => 'Debe ingresar un nombre a la marca',
            'name.unique'   => 'La marca ya existe',
        ]);

        $category = new CatalogBrand($request->all());
        $category->save();
        
        return redirect()->route('cat_brands.index')->with('message','Marca creada');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $item = CatalogBrand::find($id);
        return view('vadmin.catalog.brands.edit')->with('item', $item);
    }

    public function update(Request $request, $id)
    {
        $item = CatalogBrand::find($id);

        $this->validate($request,[
            'name'          => 'required|min:4|max:250|unique:catalog_brands,name,'.$item->id,
        ],[
            'name.required' => 'Debe ingresar un nombre a la marca',
            'name.unique'   => 'La marca ya existe'
        ]);
        
        $item->fill($request->all());
        $item->save();

        return redirect()->route('cat_brands.index')->with('message','marca editada');
    } 

    public function updateField(Request $request)
    {
        $article = CatalogBrand::find($request->id);
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
                $record = CatalogBrand::find($id);
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
} // End
