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
use Illuminate\Database\Eloquent\Builder;
use Input;


use Intervention\Image\Facades\ImageManager;



class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        

        $articles = Article::Search($request->title)->orderBy('id','DESC')->paginate(4);
        //each es una especie de foreach
        $articles->each(function($articles){
            //user hace referencia a la relacion en el modelo
            $articles->category;
            $articles->user;
            $articles->tags;
            //$articles->image;

            //dd($articles);
        });



        return View('admin.listaarticulos')->with('articles',$articles);
          
         //dd($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //pluck sustituye a lists
        $categories = Category::orderBy('name','ASC')->pluck('name','id');//nos traemos las categorias
        //dd($categories);
        $tags = Tag::orderBy('name','ASC')->pluck('name','id');

        
        return view('admin.articles.create')->with('categories',$categories)->with('tags',$tags);
    }

    /*metodo para filtrar las categorias que se puede mostrar en formulario de añadir imagen, según usuario*/
    public function eventos(){

        $categories = Category::orderBy('name','ASC')->where('id', '!=', 1)->pluck('name','id');
        

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

        //dd($article);
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

        flash('La imagen '.$image->name.' se ha creado correctamente. Compruebalo en zona multimedia')->success();
        
        return redirect()->route('inicio');
        
        

        //dd($article);

    }


    /**
     * metodo para la edicción de articulos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        
        $article = Article::find($id);
        $article->category;
        

        //pluck sustituye a lists
        $categories = Category::orderBy('name','DESC')->pluck('name','id');
        
        $tags = Tag::orderBy('name','DESC')->pluck('name','id');
        
        //obtenemos los tag_id en forma de array para mostrar los tags correctos de cada articulo a editar
        $mis_tags=$article->tags->pluck('id')->ToArray();
        //dd($mis_tags);

        //devolvemos la vista para la edición de los articulos
        return view('admin.articles.edit')
        ->with('article',$article)
        ->with('categories',$categories)
        ->with('tags',$tags)
        ->with('mis_tags',$mis_tags);
    }


    public function editcategoryone($id)
    {
        
        $article = Article::find($id);
        $article->category;
        

        //pluck sustituye a lists
        $categories = Category::orderBy('name','ASC')->where('id', '!=', 1)->pluck('name','id');
        
        $tags = Tag::orderBy('name','DESC')->pluck('name','id');
        
        //obtenemos los tag_id en forma de array para mostrar los tags correctos de cada articulo a editar
        $mis_tags=$article->tags->pluck('id')->ToArray();
        //dd($mis_tags);


        //devolvemos la vista para la edición de los articulos
        return view('admin.articles.edit')
        ->with('article',$article)
        ->with('categories',$categories)
        ->with('tags',$tags)
        ->with('mis_tags',$mis_tags);
    }
    

    /**
     * metodo para actualizar la info cambiada
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        //obtenemos los articulos según su id
        $article = Article::find($id);
        //guardamos cambios
        $article->fill($request->all());
        $article->save();

        //sincronizamos la tabla pivote
        $article->tags()->sync($request->tags);

        flash('El articulo '.$article->title.' se ha actualizado correctamente')->important();

        return redirect()->route('admin.listaarticulos');

    }

    public function updateifuser(Request $request, $id)
    {
        
        //obtenemos los articulos según su id
        $articles = Article::find($id);
        //guardamos cambios
        $articles->fill($request->all());
        $articles->save();

        //sincronizamos la tabla pivote
        $articles->tags()->sync($request->tags);

        flash('El articulo '.$articles->title.' se ha actualizado correctamente, compruebalo en la Zona multimedia')->important();

        
        return redirect()->route('inicio');
    }
    



    /**
     * metodo para eliminar un articulo
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $article =Article::find($id);
        $article->delete();

        flash('El articulo '.$article->title.' se ha eliminado correctamente')->error()->important();

        return redirect()->route('admin.listaarticulos');

    }
    
}

