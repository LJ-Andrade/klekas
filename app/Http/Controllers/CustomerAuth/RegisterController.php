<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\GeoProv;
use Mail;
use App\Mail\SendMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    // protected $redirectTo = '/registro-completo';
    protected function redirectTo()
    {
        $customer = auth()->guard('customer')->user();
        // If group 3 put register to hold
        // if($customer->group == '3' && $customer->status == '0' ){
        //     return '/registro-en-proceso';
        // } else {
        //     return '/registro-completo';
        // }
        return '/tienda';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:customers',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|string|min:4',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'username.required' => 'Debe ingresar un nombre de usuario',
            'email.required' => 'Debe ingresar un email',
            'email.email' => 'La dirección de email parece inválida',
            'email.unique' => 'Ya hay un usuario registrado con el mismo email',
            'password.required' => 'Debe ingresar una contraseña',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'phone.required' => 'Debe ingresar un teléfono',
            'phone.min' => 'El teléfono no parece correcto'
        ]);
    }

    protected function create(array $data)
    {
        $status = '1'; // Active
        $group = '2'; // Min 
        if ($data['group'] == '3') {
            $group = '3'; // Reseller
        }

        // $cuit = null;
        // $dni = null;
        // $phone = null;
        // $geoProvId = null;
        // $geoLocId = null;

        // if (isset($data['cuit'])) {
        //     $cuit = $data['cuit'];
        // }
        // if (isset($data['dni'])) {
        //     $dni = $data['dni'];
        // }
        // if (isset($data['phone'])) {
        //     $phone = $data['phone'];
        // }
        // if (isset($data['geoprov_id'])) {
        //     $geoProvId = $data['geoprov_id'];
        // }
        // if (isset($data['geoloc_id'])) {
        //     $geoLocId = $data['geoloc_id'];
        // }
        return Customer::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'status' => $status,
            // 'geoprov_id' => $geoProvId,
            // 'geoloc_id' => $geoLocId,
            // 'cuit' => $cuit,
            // 'dni' => $dni,
            'password' => bcrypt($data['password']),
            'group' => $group
        ]);
    }

    protected function guard()
    {
        return auth()->guard('customer');
    }

    public function showRegistrationForm()
    {
        // $geoprovs = GeoProv::pluck('name','id');
        return view('store.register');
            // ->with('geoprovs',$geoprovs);
    }

    public function showRegistrationFormReseller()
    {
        $geoprovs = GeoProv::pluck('name', 'id');

        return view('store.register-reseller')
            ->with('geoprovs', $geoprovs);
    }

    public function register(Request $request)
    {
        // Custom Horrible Validations
        if ($request->group != '2' && $request->group != '3')
            return back()->withErrors('No se ha seleccionado un tipo de usuario');

        if ($request->group == '3') {
            if ($request->CuitOrDni == 'Cuit')
                if (strlen($request->cuit) != 11)
                return redirect()->back()->withErrors('El CUIT debe tener 11 números');

            if ($request->CuitOrDni == 'Dni')
                if (strlen($request->dni) != 8)
                return redirect()->back()->withErrors('El DNI debe tener 8 números');

        }

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        try {
            $subject = 'Nuevo usuario registrado';
            $message = 'Un usuario se ha registrado en la tienda';
            Mail::to(APP_EMAIL_1)->send(new SendMail($subject, 'SimpleMail', $message));
        } catch (\Exception $e) {
            // dd($e->getMessage());
        }

        return $this->registered($request, $user)
            ? : redirect($this->redirectPath()); 
    }
}
