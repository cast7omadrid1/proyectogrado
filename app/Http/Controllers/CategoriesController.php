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
        
    	//usamos el metodo Search para el buscador de categorias
    	$categories=Category::Search($request->name)->orderBy("id","ASC")->paginate(2);

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

        flash('La categoria '.$category->name.' se ha creado correctamente')->success();
     	
     	return redirect()->route('categories.listacategorias');

    }




     public function edit($id)
    {

    	$category = Category::find($id);

    	return view('admin.categories.edit')->with('category',$category);


    }


     public function update(Request $request, $id)
    {


    	$category = Category::find($id);
    	//reemplazamos los datos con los datos obtenidos del formulario
    	$category->fill($request->all());
    	$category->save();

        flash('La categoria '.$category->name.' se ha actualizado correctamente')->important();

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

        flash('La categoria '.$category->name.' se ha eliminado correctamente')->error()->important();
        
        return redirect()->route('categories.listacategorias');

    }

}

    


