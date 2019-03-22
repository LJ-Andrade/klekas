<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class MercadoPagoController extends Controller
{

    public function MPSuccess(Request $request)
    {
        try
        {
            if(count($request->all()))
            {
                $order = Cart::findOrFail($request->external_reference);
                $this->SavePaymentData($order, $request->all(), "success");
                return view('store.checkout-success')->with('cart', $order);
            }
            else
                dd("No hay datos en mp-success");

        } catch (\Exception $e) {
            return back()->with('error', 'Ha ocurrido un error '. $e->getMessage());
        }    
    }

    public function MPPending(Request $request)
    {
        if(count($request->all()))
        {
            $order = Cart::findOrFail($request->external_reference);
            $this->SavePaymentData($order, $request->all(), "pending");
            return view('store.checkout-success')->with('cart', $order);
        }
        else
            dd("Pago pendiente");
    }

    public function MPFailure(Request $request)
    {
        if(count($request->all()))
        {
            return view('store.checkout-failure');
        }
        else
        {
            return view('store.checkout-failure');
        }
    }
    
    public function SavePaymentData($cart, $request, $status)
    {
        try
        {
        
            if($status == "success")
                $cart->payment_status = "1";
            elseif($status == "pending")
                $cart->payment_status = "2";
                
            $cart->mp_preference_id = $request['preference_id'];
            $cart->mp_collection_id = $request['collection_id'];
            $cart->mp_payment_type = $request['payment_type'];
            $cart->mp_merchant_order_id = $request['merchant_order_id'];
            $cart->status = 'Process';
            $cart->save();
            return $cart;
            // Notify customer
            // try
            // {
            //     // Notify Bussiness
            //     Mail::to(APP_EMAIL_1)->send(new SendMail('Compra Recibida', 'Checkout', $cart));
            //     // Notify Customer
            //     $customerEmail = auth()->guard('customer')->user()->email;
            //     //$customerEmail = 'javzero1@gmail.com';
            //     Mail::to($customerEmail)->send(new SendMail('Bruna Indumentaria - Compra recibida !', 'CustomerCheckout', ''));
            // } catch (\Exception $e) {
            //     // If there is some error sending mail, do nothing, continue with proccess.
            //     //dd($e->getMessage());
            // }

            return view('store.checkout-success')->with('cart', $cart);

        } catch (\Exception $e) {
            dd($e->getMessage());
            // return back()->with('error', 'Ha ocurrido un error '. $e->getMessage());
        }  
    }


}
