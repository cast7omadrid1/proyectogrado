<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Article;
use Intervention\Image\Facades\ImageManager;
use Illuminate\Database\Eloquent\Builder;
use App\Category;
use App\Tag;

class ImagenesController extends Controller
{
    

	public function index(Request $request){

		/*$images = Image::all();*/
		$images=Image::Search($request->name)->orderBy("id","ASC")->paginate(6);
		//dd($images);
		$images->each(function($images){
			$images->article;
			
		});

		//$categories=Category::orderBy('name','ASC')->get();
        //$tags=Tag::orderBy('name','ASC')->get();

		//dd($categories);
		/*pruebas redimensión de imagenes*/

		/*$images=Image::make('public/blog-mini-02.jpg');
		//dd($images);
		$images->resize(200, 200);*/
		//dd($images);
		//retornamos las imagenes
		return View('zonamultimedia')->with('images',$images);
	}


	public function searchCategory($name){

		//metodo first para obtener un objeto y no una colección
		$category = Category::SearchCategory($name)->first();
		
		$articles = $category->articles()->paginate(6);

		dd($article);

		$articles->each(function($articles){
			$articles->category;
			$articles->images;
		});


		return View('zonamultimedia')->with('images',$images);
		

	}




}
