<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Article;
use App\Category;
use App\Tag;
use App\Contact;
use Mail;
use App\Mail\WebContactMail;

class WebController extends Controller
{

	public function __construct()
	{
		Carbon::setLocale('es');
	}

	public function home()
	{
		return view('web.index');
	}
	
	public function getDownload($data){
		
		$filename = $data;
		$file = public_path()."/web/pdf/".$filename;
		$headers = array('Content-Type: application/pdf',);
		return \Response::download($file, $data, $headers);
	}

	public function portfolio(Request $request)
	{
		$articles = Article::search($request->title)->orderBy('id', 'DESC')->where('status', '1')->paginate(12);
		$articles->each(function($articles){
			$articles->category;
			$articles->images;
		}); 
		return view('web.portfolio.portfolio')
			->with('articles', $articles);
	}

	public function searchCategory($name)
	{
		$category = Category::SearchCategory($name)->first();
		$articles=$category->article()->paginate(12);
		$articles->each(function($articles){
				$articles->category;
				$articles->images;
		});
		return view('web.portfolio.portfolio')->with('articles', $articles);
	}

	public function searchTag($name)
	{
		$tag = Tag::SearchTag($name)->first();
		$articles = $tag->article()->paginate(12);
		$articles->each(function($articles){
				$articles->category;
				$articles->images;
		});
		return view('web.portfolio.portfolio')->with('articles', $articles);
	}

	public function viewArticle($id)
	{
		$article = Article::find($id);
		$article->each(function($article){
				$article->category;
				$article->images;
				$article->tags;
				$article->colors;
		});
		return view('web.portfolio.article')->with('article', $article);
	}

	public function showWithSlug($slug) {

		$article = Article::where('slug', '=', $slug)->first();
		// dd($article);
		return view('web.portfolio.article')->with('article', $article);
	}

	public function contact()
	{  
		return view('contacto');
	}

	public function mail_sender(Request $request)
	{

		// $MailToAddress    = "info@studiovimana.com.ar";
		// $MailSubject      = "Mensaje desde la web";

		// if (!isset($MailFromAddress) ) {
		// 	$MailFromAddress = "info@studiovimana.com.ar";
		// }

		// $Header = "Contacto desde la Web";
		// $Message = $Footer = "";

		// if (!is_array($_POST))
		// 	return;
		// 	reset($_POST);

		// // Genera un mensaje personalizado.
		// $Message  = "Nombre/Empresa: ".stripslashes($_POST['name'])." \n";
		// $Message .= "Tel.: ".stripslashes($_POST['phone'])." \n";
		// $Message .= "E-Mail: ".stripslashes($_POST['email'])." \n";
		// $Message .= "Consulta/Mensaje: ".stripslashes($_POST['message'])." \n";

		// if ($Header) {
		// 	$Message = $Header."\n\n".$Message."\n\n";
		// }

		// // $REMOTE_USER = (isset($_SERVER["REMOTE_USER"]))?$_SERVER["REMOTE_USER"]:"";
		// $REMOTE_ADDR = (isset($_SERVER["REMOTE_ADDR"]))?$_SERVER["REMOTE_ADDR"]:"";
		// // $Message .= "REMOTE USER: ". $REMOTE_USER."\n";
		// $Message .= "I.P del contacto: ". $REMOTE_ADDR."\n";

		// if ($Footer) {
		// 	$Message .= "\n\n".$Footer;
		// }

		try{
			// Está deshabilitada la funcion envío vía mail hasta que sea permitido el uso de SMTP desde Digital Ocean
			// mail("$MailToAddress", "$MailSubject", "$Message", "From: $MailFromAddress");
			$contact = new Contact();
			$contact->fill($request->all());
			$contact->save();
			$subject = 'Nuevo contacto desde la web';

			Mail::to(APP_EMAIL_1)->send(new WebContactMail($subject, $contact));
			
			return response()->json(['response' => 1,
									 'error'    => '0']); 
		} catch(Exception $e) {
			return response()->json(['response' => 0,
									 'error'    => $e]); 
		}

		// function ValidarDatos($campo){
		// 	//Array con las posibles cabeceras a utilizar por un spammer
		// 	$badHeads = array("Content-Type:",
		// 	"MIME-Version:",
		// 	"Content-Transfer-Encoding:",
		// 	"Return-path:",
		// 	"Subject:",
		// 	"From:",
		// 	"Envelope-to:",
		// 	"To:",
		// 	"bcc:",
		// 	"cc:");

		// 	foreach($badHeads as $valor){
		// 		if(strpos(strtolower($campo), strtolower($valor)) !== false){
		// 			header( "HTTP/1.0 403 Forbidden");
		// 			exit;
		// 		}
		// 	}
		// }
		// ValidarDatos($_POST['name']);
		// ValidarDatos($_POST['email']);
		// ValidarDatos($_POST['phone']);
		// ValidarDatos($_POST['message']);
		}		



}
