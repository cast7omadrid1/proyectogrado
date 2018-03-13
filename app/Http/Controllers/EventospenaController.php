<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Image;
use App\Article;
use App\Category;
use App\Tag;
use App\Comentarios;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;




class EventospenaController extends Controller
{
    
    /*public function eventospena(){
        return view('eventospena');
    }*/




    public function index(Request $request){

		/*$images = Image::all();
		$images=Image::Search($request->name)->orderBy("id","ASC")->paginate(6);
		//dd($images);
		$images->each(function($images){
			$images->article;
			
		});*/


		/*return View('zonamultimedia')->with('images',$images);*/


		//$articles = Article::orderBy('id','DESC')->paginate(6);
		
		$articles = Article::orderBy('id','DESC')->where('category_id', '=', 1)->paginate(6);

	
		$articles->each(function($articles){
			$articles->category;
			$articles->images;
			
		});


		/*$comentarios = Comentarios::orderBy('id','DESC')->get();
		

		$comentarios->each(function($comentarios){
			$comentarios->article;
			$comentarios->user;
			dd($comentarios);
		});*/

		//dd($comentarios);
		
		
		return View('eventospena')->with('articles',$articles);

		
	}


	public function __construct(){
		Carbon::setLocale('es');
	}

	/*metodo para agregar comentarios a los articulos*/
	public function store(Request $request,$id){


		//creamos un nuevo objeto para comentarios
		$comentarios = new 	Comentarios($request->all());
		$comentarios->usuario_id = \Auth::user()->id;
		//dd($comentarios);

		
		$articles=Article::find($id);
    	$comentarios->articulo_id = $articles->id; 
    	//dd($comentarios);
		
		$comentarios->save();

		/*Crear vista para agradecer el comentario!*/
		 /*return view('index');*/
		
	}




}