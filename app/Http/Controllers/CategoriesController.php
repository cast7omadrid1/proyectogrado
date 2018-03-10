<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoriesController extends Controller
{
    


 	/*
 	 *
     * Metodo para listar categorias.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    	$categories = Category::orderBy('id','ASC')->paginate(2);

        return view('admin.categories.listacategorias')->with('categories',$categories);
        
    }

	/**
     * metodo para mostrar formulario crecion categorias 
     *
     * @return \Illuminate\Http\Response
     */


	public function create(){


		return view('admin.categories.create');

	}

/**
     * Metodo para crear categorias
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
    	$category = new Category($request->all());
    	$category->save();
     	
     	return redirect()->route('categories.listacategorias');

    }




    /**
     * metodo para eliminar una categoria
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    	$category = Category::find($id);
    	$category->delete();
        
       
       return redirect()->route('categories.listacategorias');

    }

}

    


