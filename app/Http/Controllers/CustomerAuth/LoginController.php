<?php

namespace App\Http\Controllers\CustomerAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Customer;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/tienda';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //    $this->middleware('customer')->except('logout');
    }

    // Use this to login with username
    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }

    protected function authenticated(Request $request, $user)
    {   
        if(auth()->guard('customer')->user()->status == 0 && auth()->guard('customer')->user()->group == 3)
        {
            if(auth()->guard('customer')->user()->status == 0)
            {
                $request->session()->invalidate();
                auth()->guard()->logout();
                return redirect('tienda')->with('message', 'Su cuenta está en revisión.');
            }
            else
            {
                $request->session()->invalidate();
                auth()->guard()->logout();
                return redirect('tienda')->with('message', 'Ha solicitado ser cliente mayorísta. En cuanto sea aprobado podrá loguearse para comprar.');
            }
        }
    }

    protected function guard(){
        return auth()->guard('customer');
    }

    public function showLoginForm(){
        if(auth()->guard('customer')->check()){
            return redirect('tienda');
        } else {
            return view('store.login');
        }
    }

    /**
     * Log the client out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request){
        
        $this->guard('customer')->logout();
        $request->session()->invalidate();
        return redirect('/tienda');
    }

}
