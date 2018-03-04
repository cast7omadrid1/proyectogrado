<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

class ContactoController extends Controller
{
    
    public function contacto(){

    	/*$mensaje = null;
    	if (isset($_POST['contacto'])){

    		$data = array(
    			'name'=>Input::get('name'),
    			'email'=>Input::get('email'),
    			'subject'=>Input::get('subject'),
    			'msg' =>Input::get('msg')
    		);

    		$fromEmail='socceraddicts@gmail.com';
    		$fromName='Admin';

    		Mail::send('email.plantillamail', $data,function($message) use ($fromName,$fromEmail)
			{
    			$message->to($fromEmail,$fromName);
    			$message->from($fromEmail,$fromName);
    			$message->subject('Nuevo email de contacto');

    		});
    		$mensaje='<div class="text-info">Mensaje enviado con exito</div>';
    	}*/


        /*return view('contacto',array('mensaje' =>$mensaje));*/

        return view('contacto');
    }



}