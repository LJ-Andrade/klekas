<?php

namespace App\Http\Controllers\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

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
            $categories = Category::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $categories = Category::orderBy('id','ASC')->paginate(15);
        }

        return view('vadmin.portfolio.categories.index')->with('categories', $categories);
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
        return view('vadmin.portfolio.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:4|max:250|unique:categories',
        ],[
            'name.required' => 'Debe ingresar un nombre a la categoría',
            'name.unique'   => 'La categoría ya existe',
        ]);

        $category = new Category($request->all());
        $category->save();

        return redirect()->route('categories.index')->with('message','Categoría creada');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $category = Category::find($id);
        return view('vadmin.portfolio.categories.edit')->with('category', $category);

    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $this->validate($request,[
            'name' => 'required|min:4|max:250|unique:categories,name,'.$category->id,
        ],[
            'name.required' => 'Debe ingresar un nombre a la categoría',
            'name.unique'   => 'La categoría ya existe'
        ]);
        
        $category->fill($request->all());
        $category->save();

        return redirect()->route('categories.index')->with('message','Categoría editada');
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
                $item = Category::find($id);
                $item->delete();
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
    }
} // End
