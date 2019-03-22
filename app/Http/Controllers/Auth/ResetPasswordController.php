<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    protected $redirectTo = '/vadmin';

    public function __construct()
    {
        $this->middleware('guest:user');
    }
 
    public function showResetForm(Request $request, $token = null) {
        return view('auth.passwords.reset')
            ->with(['token' => $token, 'email' => $request->email]
            );
    }
 
    //defining which guard to use in our case, it's the admin guard
    protected function guard()
    {
        return Auth::guard('user');
    }
 
    //defining our password broker function
    protected function broker() {
        return Password::broker('users');
    }
}
