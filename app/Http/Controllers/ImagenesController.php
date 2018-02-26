<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use Intervention\Image\Facades\ImageManager;
use Illuminate\Database\Eloquent\Builder;


class ImagenesController extends Controller
{
    

	public function index(Request $request){


		/*$images = Image::all();*/
		$images=Image::Search($request->name)->orderBy("id","ASC")->paginate(6);
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
