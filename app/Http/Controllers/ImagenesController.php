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
use Carbon\Carbon;

class ImagenesController extends Controller
{
    

	public function index(Request $request){

		/*$images = Image::all();
		$images=Image::Search($request->name)->orderBy("id","ASC")->paginate(6);
		//dd($images);
		$images->each(function($images){
			$images->article;
			
		});*/


		/*return View('zonamultimedia')->with('images',$images);*/


		$articles = Article::orderBy('id','DESC')->paginate(6);
		
		$articles->each(function($articles){
			$articles->category;
			$articles->images;
		});
		
		

		return View('zonamultimedia')->with('articles',$articles);

	}

	
	//para la gestión del tiempo articulos
	public function __construct(){
		Carbon::setLocale('es');
	}


	public function searchCategory($name){

		//metodo first para obtener un objeto y no una colección
		$category = Category::SearchCategory($name)->first();
		
		$articles = $category->articles()->paginate(6);

		

		$articles->each(function($articles){
			$articles->category;
			$articles->images;
		});


		return View('zonamultimedia')->with('articles',$articles);
		

	}


	public function searchTag($name){

		//metodo first para obtener un objeto y no una colección
		$tag = Tag::SearchTag($name)->first();
		$articles=$tag->articles()->paginate(6);

		$articles->each(function($articles){
			$articles->category;
			$articles->images;
		});
		
		return View('zonamultimedia')->with('articles',$articles);
	}

}
