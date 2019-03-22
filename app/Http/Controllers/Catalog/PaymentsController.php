<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Payment;


class PaymentsController extends Controller
{

    //routeGroup: Vadmin/
    //viewName:   payments
    //crudName:   payments
    //crudNameSingular: payment
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
            $items = Payment::searchname($name)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $items = Payment::orderBy('id','ASC')->paginate(15);
        }

        return view('vadmin.catalog.payments.index')->with('items', $items);
    
    }

    public function show($id)
    {
        $item = Payment::findOrFail($id);
        return view('vadmin.catalog.payments.show', compact('item'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.catalog.payments.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name'             => 'required|min:4|max:250|unique:payment_methods',
            'percent'          => 'required'
        ],[
            'name.required'    => 'Debe ingresar un nombre',
            'name.unique'      => 'El item ya existe',
            'percent.required' => 'Debe ingresar un porcentaje'
        ]);

        $item = new Payment($request->all());
        $item->save();

        return redirect()->route('payments.index')->with('message', 'Método de pago creado');

    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $item = Payment::findOrFail($id);
        return view('vadmin.catalog.payments.edit', compact('item'));
    }

    public function update($id, Request $request)
    {
        $item = Payment::find($id);

        $this->validate($request,[
            'name'             => 'required|unique:payment_methods,name,'.$item->id,
            'percent'          => 'required'
        ],[
            'name.required'    => 'Debe ingresar un nombre',
            'name.unique'      => 'El item ya existe',
            'percent.required' => 'Debe ingresar un porcentaje'
        ]);
        
        $item->fill($request->all());
        $item->save();

        return redirect()->route('payments.index')->with('message','Método de pago editado');
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
                $item = Payment::find($id);
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

}
