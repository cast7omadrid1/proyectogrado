<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Article;
use App\Image;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        

        ////manipulación imágenes

        if($request->file('image')){

            $file = $request->file('image');
            //le damos un nombre unico a cada imagen
            $name = 'socceradicts_' . time() .'.'.$file->getClientOriginalExtension();
            //ruta donde guardar las imagenes
            $path = public_path() . '/images/articulos/';
            //mover archivos según la imagen y según la ruta
            $file->move($path,$name);
            //dd($path);
        }

        //creamos objeto para obtener toda la información de los articulos
        $article = new Article($request->all());
        //almacenamos el id del usuario
        $article->user_id = \Auth::user()->id;
        //guardamos
        $article->save();
        
        //objeto creado para imagenes
        $image = new Image();
        //almacenamos el nombre de la imagen dentro del objeto dentro de la columna name
        $image->name=$name;
        //associate va a encontrar la clave foranea asociada al objeto $article y la almacenará en el objeto $image
        $image->article()->associate($article);
        //almacenamos el objeto
        $image->save();

        return redirect()->route('zonamultimedia');

        //dd($article);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
