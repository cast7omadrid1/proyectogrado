<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class ArticulosController extends Controller
{
   


   	public function addimage(){
        return view('admin.articulos.addimage');
    }


    /*public function store(Request $request){

    	//Manipulación de imagenes
    	$file=$request->file('image');
    	dd($file);
    }*/




}

