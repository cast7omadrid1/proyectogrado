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

class ImagenesusuarioController extends Controller
{
    public function index(Request $request){

    	//obtenemos el id del usuario logado
    	$iduser = \Auth::user()->id;

    	//obtenemos los articulos según el usuario que lo haya subido
    	$articles = Article::orderBy('id','DESC')->where('user_id', '=', $iduser)->paginate(10);
    	//dd($articles);

    	/*obtenemos las relaciones */
    	$articles->each(function($articles){
			$articles->category;
			$articles->image;
			
		});

    	return View('imagenesusuario')->with('articles',$articles);
    }
}
