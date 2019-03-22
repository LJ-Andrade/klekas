<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Cart;
use App\CatalogArticle;
use App\Customer;
use App\User;
use App\Settings;
use App\Mail\SendSupportMail;
use App\Mail\SendMail;
use Mail;
use Carbon\Carbon;
use MP;


class VadminTestsController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    

    public function tests()
    {
        $carts = Cart::where('status','ACTIVE')->get();
        return view('vadmin.tools.tests')->with('carts', $carts);
    }

    public function testMailSending(Request $request)
    {
        $class = $request->mailclass;

        try 
        {
            Mail::to($request->maildestiny)->send(new SendMail("Mail de prueba", 'SimpleMail', "Este es un mail de prueba, no responder, gracias."));
            return back()->with('message', 'Mail enviado?');
        } 
        catch (\Exception $e) 
        {
            return back()->with('message', $e->getMessage());
        }
    }  

    public function testImageUpload(Request $request)
    {
        // dd($request->all());
        
        $imgPath = public_path("webimages/imgTest/");
    
        $FileUploader = new FileUploader('files', array(
            'uploadDir' => $imgPath
        ));
        // call to upload the files
        $data = $FileUploader->upload();
        dd($data);
        $path = $data['files'][0]['file'];
        
        // $path = '/var/www/html/kelolahunian/public/storage/' . $title;
        $uploader = Upload::upload($path);
        $url = $uploader->url;
        // dd($uploader);
        
        echo json_encode($url);

    }

    public function TestMp()
    {
        $preference_data = [
            "external_reference" => '99',
            "items" => [
                [
                    'id' => 'Id del articulo',
                    'title' => 'Titulo del articulo',
                    'description' => 'Descripcion del articulo',
                    'picture_url' => 'Imagen del articulo',
                    'quantity' => 1,
                    'currency_id' => "ARS",
                    'unit_price' => 1
                ]
            ],
            "payer" => [
                'name' => 'John',
                'surname' => 'Snow',
                'email' => 'snow@bastard.com.ar',
                'date_created' => Carbon::now()
            ],
            'back_urls' => [
                'success' => url('vadmin/mp-success'),
                'pending' => url('vadmin/mp-pending'),
                'failure' => url('vadmin/mp-failure')
            ],
            "auto_return" => "approved"
        ];
    
        $preference = MP::post("/checkout/preferences", $preference_data);
        // return dd($preference);
        if(env('MP_APP_RODUCTION'))
            $initPoint = $preference['response']['init_point'];
        else
            $initPoint = $preference['response']['sandbox_init_point'];
        // dd($initPoint);
        return redirect($initPoint);
    }
    

}
