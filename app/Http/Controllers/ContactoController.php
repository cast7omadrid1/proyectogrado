<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    
    public function contacto(){

        return view('contacto');
    }



public function send(Request $request)
   {
       //guarda el valor de los campos enviados desde el form en un array
       $data = $request->all();
 	
 	   $fromEmail='socceraddicts@gmail.com';
       $fromName='Admin';


       //se envia el array y la vista lo recibe en llaves individuales {{ $email }} , {{ $subject }} a la vista email.message
       \Mail::send('email.message', $data, function($message) use ($request,$fromEmail,$fromName)
       {
           //remitente
           $message->from($request->email, $request->name);
 
           //asunto
           $message->subject($request->subject);
 
           //receptor
           /*$message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'));*/
           $message->to($fromEmail,$fromName);
 
       });
       return view('success');//retornamos a la vista success
   }


}