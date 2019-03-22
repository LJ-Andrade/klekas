<?php

namespace App\Http\Controllers\CustomerAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest:customer');
    }
    
    public function broker()
    {
        return Password::broker('customers');
    }
    
    public function showLinkRequestForm() {
        return view('store.passwords.email');
    }

}
