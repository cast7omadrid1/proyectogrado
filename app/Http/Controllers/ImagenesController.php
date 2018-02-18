<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;

class ImagenesController extends Controller
{
    

	public function index(){


		$images = Image::all();
		$images->each(function($images){
			$images->article;
		});

		//dd($images);
		//retornamos las imagenes
		return View('zonamultimedia')->with('images',$images);;
	}


}
