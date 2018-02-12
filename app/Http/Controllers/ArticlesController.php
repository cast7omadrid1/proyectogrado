<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticleRequest;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $articles = Article::Search($request->title)->orderBy('id','DESC')->paginate(2);
        //each es una especie de foreach
        $articles->each(function($articles){
            //user hace referencia a la relacion
            $articles->user;
            $articles->image;

            //dd($articles->image);
        });


        $images = Image::orderBy('id')->paginate(5);
        $images->each(function($images){
            $images->article;
            
        });


        return View('admin.listaarticulos')->with('articles',$articles)->with('images',$images);
          
         //dd($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::orderBy('name','ASC')->pluck('name','id');//nos traemos las categorias
        //dd($categories);
        $tags = Tag::orderBy('name','ASC')->pluck('name','id');

        return view('admin.articles.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        

        //dd($request->input('tags'));
        ////manipulación imágenes

        if($request->file('image')){

            $file = $request->file('image');
            //dd($file);
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
        

        //rellenamos la tabla pivote
        $article->tags()->sync($request->tags);




        //objeto creado para imagenes
        $image = new Image();
        //almacenamos el nombre de la imagen dentro del objeto dentro de la columna name
        $image->name=$name;
        //associate va a encontrar la clave foranea asociada al objeto $article y la almacenará en el objeto $image
        $image->article()->associate($article);
        //almacenamos el objeto
        $image->save();


        //if(Route::has('login')){
            //if(Auth::check()){
                //if(Auth::user()->user == 0){
                    return redirect()->route('zonamultimedia');
                //}else if(Auth::user()->user == 1){
                   //return redirect()->route('admin.articles.listaarticulos');
                //}
            //}

        //}

        

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
