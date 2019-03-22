<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Cart;
use App\CatalogArticle;
use App\Customer;
use App\User;
use App\GeoProv;
use App\GeoLoc;
use Mail;
use App\Mail\SendMail;
use App\Mail\SendSupportMail;
use App\Settings;


class VadminController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:user');
    }
    
    public function index(Request $request)
    {
        $catalogarticlesCount = CatalogArticle::count();
        $customersCount = Customer::count();
        $activeCartsCount = Cart::where('status', 'Active')->count();
        $processCartsCount = Cart::where('status', 'Process')->count();
        $approvedCartsCount = Cart::where('status', 'Approved')->count();
        $finishedCartsCount = Cart::where('status', 'Finished')->count();
        return view('vadmin.vadmin')
            ->with('catalogarticlesCount', $catalogarticlesCount)
            ->with('customersCount', $customersCount)
            ->with('activeCartsCount', $activeCartsCount)
            ->with('processCartsCount', $processCartsCount)
            ->with('approvedCartsCount', $approvedCartsCount)
            ->with('finishedCartsCount', $finishedCartsCount); 
    }

    public function storeControlPanel(Request $request)
    {
        $activeCarts = Cart::where('status', 'Active')->count();
        return view('vadmin.catalog.control-panel')
            ->with('activeCarts', $activeCarts);
    }

    public function docs(Request $request)
    {
        return view('vadmin.support.docs');
    }


    public function searchData(Request $request)
    {
        
        $term = $request->get('term');
    	$data = DB::table('users')->where("name","LIKE","%$term%")->select('title as value','slug as link')->get();
        return response()->json($data);
 
       // Something to note here : autocomplete takes value as your data so your title should be displayed as value as i did in my query else data will not be displayed
    }

    /*
    |--------------------------------------------------------------------------
    | MESSAGES / CONTACTS
    |--------------------------------------------------------------------------
    */

    public function storedContacts($status)
    {   
        
        switch($status){
            case '*':
                $items = Contact::where('status', '!=', '3')->orderBy('id','DESC')->paginate(10);
                break;
            case '3':
                $items = Contact::where('status', '3')->orderBy('id','DESC')->paginate(10);
                break;
            default;
                $items = Contact::where('status', '!=', '3')->orderBy('id','DESC')->paginate(10);
        }
                
        return view('vadmin.contact.index')
            ->with('items', $items);
    }

    public function searchStoredContact(Request $request)
    {   
        $items = Contact::where('name', 'LIKE', "%$request->searchTerm%")
            ->orWhere('email', 'LIKE', "%$request->searchTerm%")
            ->orderBy('id','DESC')
            ->paginate(10);

        return view('vadmin.contact.index')
            ->with('items', $items);
    }

    public function showStoredContact(Request $request, $id)
    {
        $item = Contact::findOrFail($id);
        return view('vadmin.contact.show')
            ->with('item', $item);
    }

    public function updateMessageStatus(Request $request, $id)
    {
        
        try{
            $item = Contact::findOrFail($id);
            $item->status = $request->status;
            $item->user = $request->user;
            $item->save();
            return response()->json([
                'response'   => true,
                'message'    => 'Mensaje Actualizado'
            ]); 
        } catch (\Exception $e) {
            return response()->json([
                'response'   => false,
                'message'    => $e
            ]); 
        }
    }

    public function setMessageAsReaded(Request $request){
        // Set All messages as readed
        $user = auth()->guard('user')->user();
        if($request->id == null){
            try{
                $items = Contact::where('status', '0')->get();
                foreach($items as $item){
                    $item->status = '1';
                    $item->user = $user->name;
                    $item->save();
                }
                $newMessagesN = Contact::where('status', '=', '0')->count();
                return response()->json([
                    'response'    => true,
                    'message'     => 'Mensaje Actualizado',
                    'newMessagesN' => $newMessagesN
                ]); 
    
            } catch (\Exception $e) {
                return response()->json([
                    'response'   => false,
                    'message'    => $e
                ]); 
            }
        } else { 
            // Set Specific messages as readed    
            $id = $request->id;
            
            
            try{
                $item = Contact::findOrFail($id);
                $item->status = '1';
                $item->user = $user->name;
                $item->save();
                $newMessagesN = Contact::where('status', '=', '0')->count(); 

                return response()->json([
                    'response'    => true,
                    'message'     => 'Mensaje Actualizado',
                    'newMessagesN' => $newMessagesN
                ]); 

            } catch (\Exception $e) {
                return response()->json([
                    'response'   => false,
                    'message'    => $e
                ]); 
            }
        }
    }

    public function destroyStoredContacts(Request $request)
    {       
        $ids = json_decode('['.str_replace("'",'"',$request->id).']', true);
        
        if(is_array($ids)) {
            try {
                foreach ($ids as $id) {
                    $record = Contact::find($id);
                    $record->delete();
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
        } else {
            try {
                $record = Contact::find($id);
                $record->delete();
                    return response()->json([
                        'success'   => true,
                    ]);  
                    
                } catch (\Exception $e) {
                    return response()->json([
                        'success'   => false,
                        'error'    => 'Error: '.$e
                    ]);    
                }
        }
    }

    public function sendMail(Request $request)
    {
        $subject = 'Asunto de la notificación';
        $content = 'Pruebita';

        try {  
            
            Mail::to(APP_EMAIL_1)->send(new SendMail($subject, $content));

            return redirect('vadmin')->with('message','Mail Enviado');
        } catch (\Exception $e) {
            dd($e);
            return back()->with('error', 'Ha ocurrido un error '. $e);
        }
    }

    public function sendSupportMail(Request $request)
    {
        $subject = "**Vadmin | Consulta por soporte técnico **";
        try {  
            Mail::to(APP_EMAIL_1)->send(new SendSupportMail($subject, $request->all()));
            return back()->with('message','Gracias por su paciencia. Pronto nos pondremos en contacto.');
        } catch (\Exception $e) {
            dd($e);
            return back()->with('error', 'Ha ocurrido un error '. $e);
        }
    }
    /*
    |--------------------------------------------------------------------------
    | GENERIC FUNCTIONS
    |--------------------------------------------------------------------------
    */

	public function updateStatus($model, $id)
    {
        $model_name = '\\App\\'.$model;
        $model = new $model_name;
        $item = $model->find($id);
        
        if($item->status == '0'){
            $item->status = '1';
        } else {
            $item->status = '0';
        }
        $item->save();

        return response()->json([
            "success" => true,
            "newStatus" => $item->status
        ]);
    }
    
    public function updateStatusMultiple($id, $model, $status)
    {      
        $model_name = '\\App\\'.$model;
        $model = new $model_name;
        $item = $model->find($id);
        $item->status = $status;
        $item->user = auth()->guard('user')->user()->name;
        $item->save();

        return response()->json([
            "success" => true,
            "message" => auth()->guard('user')->user()->name
        ]);
	}
    
    

    /*
    |--------------------------------------------------------------------------
    | CONFIGS
    |--------------------------------------------------------------------------
    */

    public function settings()
    {
        return view('vadmin.tools.settings');
    }

    public function updateSettings(Request $request)
    {
        $settings = Settings::findOrFail(1);
        $settings->fill($request->all());
        $settings->save();

        return redirect()->back()->with('message', 'Opciones actualizadas');
    }

    /*
    |--------------------------------------------------------------------------
    | SUPER VADMIN
    |--------------------------------------------------------------------------
    */

    public function superVadmin()
    {
        dd('OK');
    }

}
