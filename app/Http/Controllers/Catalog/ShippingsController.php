<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shipping;


class ShippingsController extends Controller
{

    //routeGroup: Vadmin/
    //viewName:   shippings
    //crudName:   shippings
    //crudNameSingular: shipping
    //fileSnippet: 

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {   
        $name = $request->get('name');

        if(isset($name)){
            $shippings = Shipping::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $shippings = Shipping::orderBy('id','ASC')->paginate(15);
        }

        return view('vadmin.catalog.shippings.index')->with('shippings', $shippings);
    
    }

    public function show($id)
    {
        $item = Shipping::findOrFail($id);
        return view('vadmin.catalog.shippings.show', compact('item'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.catalog.shippings.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name'          => 'required|min:4|max:250|unique:shippings',
        ],[
            'name.required' => 'Debe ingresar un nombre',
            'name.unique'   => 'El item ya existe',
        ]);

        

        $item = new Shipping($request->all());
        $item->save();

        return redirect()->route('shippings.index')->with('message','Método de envío agregado !');

    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $item = Shipping::findOrFail($id);
        return view('vadmin.catalog.shippings.edit', compact('item'));
    }

    public function update($id, Request $request)
    {
        $item = Shipping::find($id);

        $this->validate($request,[
            'name'          => 'required|unique:shippings,name,'.$item->id,
        ],[
            'name.required' => 'Debe ingresar un nombre',
            'name.unique'   => 'El item ya existe'
        ]);
        
        $item->fill($request->all());
        $item->save();

        return redirect()->route('shippings.index')->with('message','Método de envío editado !');
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
                    $record = Shipping::find($id);
                    $record->delete();
                }
                return response()->json([
                    'success'   => true,
                ]); 
            }  catch (Exception $e) {
                return response()->json([
                    'success'   => false,
                    'error'    => 'Error: '.$e
                ]);    
            }
        } else {
            try {
                $record = Shipping::find($id);
                $record->delete();
                    return response()->json([
                        'success'   => true,
                    ]);  
                    
                } catch (Exception $e) {
                    return response()->json([
                        'success'   => false,
                        'error'    => 'Error: '.$e
                    ]);    
                }
        }
    }

}
