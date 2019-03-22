<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/tienda';

    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

    protected function broker() {
        return Password::broker('customers');
    }

    public function showResetForm(Request $request, $token = null) {
        return view('store.passwords.reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }
 
 
}
