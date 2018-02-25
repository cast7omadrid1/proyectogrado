<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use Intervention\Image\Facades\ImageManager;

class ImagenesController extends Controller
{
    

	public function index(){


		$images = Image::all();

		$images->each(function($images){
			$images->article;
			
		});

		/*pruebas redimensión de imagenes*/

		/*$images=Image::make('public/blog-mini-02.jpg');
		//dd($images);
		$images->resize(200, 200);*/
		//dd($images);
		//retornamos las imagenes
		return View('zonamultimedia')->with('images',$images);;
	}


}
