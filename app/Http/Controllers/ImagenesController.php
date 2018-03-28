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
use App\Comentarios;
use Carbon\Carbon;

class ImagenesController extends Controller
{
    

	public function index(Request $request){

		
		$articles = Article::orderBy('id','DESC')->paginate(6);
		
		$articles->each(function($articles){
			$articles->category;
			$articles->images;
			$articles->comentario;
		});
		

		$comentarios = Comentarios::orderBy('id','ASC')->paginate(10);
		  //dd($comentarios);

		
		$comentarios->each(function($comentarios){
			
			$comentarios->article;
			$comentarios->user;
		});


		return View('zonamultimedia')->with('articles',$articles)->with('comentarios',$comentarios);

	}

	
	//para la gestión del tiempo articulos
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

		flash('El comentario se ha creado correctamente, ve a Zona multimedia para comprobarlo ')->success();
		
		return redirect()->route('inicio');
		
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
