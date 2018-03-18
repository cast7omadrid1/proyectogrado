<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Article;
use App\Tag;
use App\Category;

class ExcelController extends Controller
{
    public function exportUsers(Request $request){

	   	Excel::create('TablaUsers', function($excel) {
	 
	    	$users = User::all();
	 
		    $excel->sheet('TablaUsers', function($sheet) use($users) {
	 
		    	
		    	/*$sheet->row(1, [
    				'ID', 'Nombre', 'Email', 'Fecha de Creación', 'Fecha de Actualización', 'User','Avatar'
				]);*/

		    	foreach($users as $index => $user) {
    				$sheet->row($index+2, [
        				$user->id, $user->name, $user->email, $user->created_at, $user->updated_at, $user->user, $user->avatar,$user->socio
    				]); 
				}


		    	$sheet->fromArray($users);
 
			});
 
		})->export('xlsx');
		
	}


	public function exportArticles(Request $request){

	   	Excel::create('TablaArticulos', function($excel) {
	 
	    	
	    	$articles = Article::all();

	    	$articles->each(function($articles){
            	//user hace referencia a la relacion en el modelo
            	$articles->category;
            	$articles->user;
            	//$articles->image;

            	//dd($articles);
        	});

	    	//dd($articles);

	 
		    $excel->sheet('TablaArticulos', function($sheet) use($articles) {
	 
		    	
		    	/*$sheet->row(1, [
    				'ID', 'Nombre', 'Email', 'Fecha de Creación', 'Fecha de Actualización', 'User','Avatar'
				]);*/

		    	foreach($articles as $index => $article) {
    				$sheet->row($index+2, [
        				$article->id, $article->title, $article->description, $article->user_id, $article->category_id, $article->created_ad, $article->updated_at, $article->category->name, $article->user->name
    				]); 
				}


		    	$sheet->fromArray($articles);
 
			});
 
		})->export('xlsx');
		
	}



	public function exportTags(Request $request){

	   	Excel::create('TablaTags', function($excel) {
	 
	    	$tags = Tag::all();
	 
		    $excel->sheet('TablaTags', function($sheet) use($tags) {
	 
		    	
		    	/*$sheet->row(1, [
    				'ID', 'Nombre', 'Email', 'Fecha de Creación', 'Fecha de Actualización', 'User','Avatar'
				]);*/

		    	foreach($tags as $index => $tag) {
    				$sheet->row($index+2, [
        				$tag->id, $tag->name, $tag->created_at, $tag->updated_at
    				]); 
				}


		    	$sheet->fromArray($tags);
 
			});
 
		})->export('xlsx');
		
	}

	public function excelcategories(Request $request){

	   	Excel::create('TablaCategorias', function($excel) {
	 
	    	$categories = Category::all();
	 
		    $excel->sheet('TablaCategorias', function($sheet) use($categories) {
	 
		    	
		    	/*$sheet->row(1, [
    				'ID', 'Nombre', 'Email', 'Fecha de Creación', 'Fecha de Actualización', 'User','Avatar'
				]);*/

		    	foreach($categories as $index => $category) {
    				$sheet->row($index+2, [
        				$category->id, $category->name, $category->created_at, $category->updated_at
    				]); 
				}


		    	$sheet->fromArray($categories);
 
			});
 
		})->export('xlsx');
		
	}

}
