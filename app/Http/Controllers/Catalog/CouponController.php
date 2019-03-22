<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatalogCoupon;


class CouponController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {   
        $code = $request->code;
        
        if($request->input('show') != null)
        {
            $items = CatalogCoupon::orderBy('id','ASC')->where('status', $request->input('show'))->paginate(15);
        } else if (isset($code))
        {
            $items = CatalogCoupon::searchcode($code)->orderBy('id', 'ASC')->paginate(15); 
        } else {
            $items = CatalogCoupon::orderBy('id','ASC')->paginate(15);
        }

        return view('vadmin.catalog.coupons.index')->with('items', $items);
    }

    // public function show($id)
    // {
    //     $item = Coupon::findOrFail($id);
    //     return view('Vadmin/Coupon.coupon.show', compact('item'));
    // }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('vadmin.catalog.coupons.create');
    }

    public function generateCatalogCoupon()
    {
        // Generate Coupon Number
        $coupon = get_rand_letters(3).'-'.get_rand_numbers(3);        
        // Check if coupon exists
        $couponExists = $this->checkCatalogCoupon($coupon);
        // Send coupon code
        if($couponExists != true) {
            return response()->json([
                'response'   => true,
                'couponCode' => $coupon
            ]);    
        } else {
            // Regenerate coupon
            $this->generateCatalogCoupon();
        }
    }
        
    
    public function store(Request $request)
    {
        if(strtotime($request->expire_date) < time()){
            return back()->with('message','La fecha de expiración es anterior a la fecha actual');
        } else if(strtotime($request->expire_date) < strtotime($request->init_date)) {
            return back()->with('message','La fecha de expiración es anterior a la fecha de inicio');
        }
        
        $this->validate($request,[
            'code'                 => 'required|min:4|max:10|unique:catalog_coupons',
            'init_date'            => 'required|date|after:yesterday',
        ],[
            'code.required'        => 'Debe ingresar un código',
            'code.unique'          => 'El código de cupón ya existe',
            'init_date.required'   => 'Debe ingresar una fecha de inicio',
            'expire_date.required' => 'Debe ingresar una fecha de expiración',
            'init_date.date'       => 'Debe ingresar una fecha',
        ]);
        
        // Check if coupon exists
        $couponExists = $this->checkCatalogCoupon($request->code);
        if($couponExists == true)
            return back()->with('message', 'El código de cupón ya existe');

        $item = new CatalogCoupon($request->all());
        $item->save();
        
        return redirect()->route('coupons.index')->with('message','Cupón creado !');
        
    }
        
    public function checkCatalogCoupon($couponCode)
    {
        $coupons = CatalogCoupon::where('code', '=', $couponCode)->first();
        if($coupons != null)
            return true;
        return false;
    }
    
    // /*
    // |--------------------------------------------------------------------------
    // | UPDATE
    // |--------------------------------------------------------------------------
    // */

    public function edit($id)
    {
        $item = CatalogCoupon::findOrFail($id);
        return view('vadmin.catalog.coupons.edit', compact('item'));
    }

    public function update($id, Request $request)
    {
        
        if(strtotime($request->expire_date) < time()){
            return back()->with('message','La fecha de expiración es anterior a la fecha actual');
        } else if(strtotime($request->expire_date) < strtotime($request->init_date)) {
            return back()->with('message','La fecha de expiración es anterior a la fecha de inicio');
        }

        $item = CatalogCoupon::find($id);
        $this->validate($request,[
            'code'                 => 'required|min:4|max:10|unique:catalog_coupons,code,'.$item->id,
            'init_date'            => 'required|date|after:yesterday',
        ],[
            'code.required'        => 'Debe ingresar un código',
            'code.unique'          => 'El código de cupón ya existe',
            'init_date.required'   => 'Debe ingresar una fecha de inicio',
            'expire_date.required' => 'Debe ingresar una fecha de expiración',
            'init_date.date'       => 'Debe ingresar una fecha',
        ]);
        
        
        $item->fill($request->all());
        $item->save();

        return redirect()->route('coupons.index')->with('message','Cupón editado !');
    }

    // /*
    // |--------------------------------------------------------------------------
    // | DESTROY
    // |--------------------------------------------------------------------------
    // */

    public function destroy(Request $request)
    {   
        $ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
    
        try {
            foreach ($ids as $id) {
                $item = CatalogCoupon::find($id);
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
