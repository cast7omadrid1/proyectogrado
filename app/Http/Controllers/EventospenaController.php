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

		$articles = Article::orderBy('id','DESC')->where('category_id', '=', 1)->paginate(6);
		//dd($articles);
		

		$articles->each(function($articles){
			$articles->category;
			$articles->image;
			$articles->comentario;
			//$articles->comentario;
		});
		
		//dd($articles);

		//$comentarios = Comentarios::orderBy('id','ASC')->paginate(10);
		  $comentarios = Comentarios::orderBy('id','ASC')->paginate(10);
		  //dd($comentarios);


		
		$comentarios->each(function($comentarios){
			
			
			$comentarios->article;
			$comentarios->user;
		});

		//$query=\DB::getQueryLog();
		
		return View('eventospena')->with('articles',$articles)->with('comentarios',$comentarios);
		//return View('eventospena')->with('articles',$articles);
		
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
		//dd($articles);
    	
    	$comentarios->articulo_id = $articles->id;
    	//dd($comentarios);
		
		$comentarios->save();

		flash('El comentario se ha creado correctamente, ve a Eventos Peña para comprobarlo ')->success();

		return redirect()->route('inicio');
		
		
	}


}