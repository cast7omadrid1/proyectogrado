<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comentarios;
use App\Article;

class ListacomentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //usamos el metodo Search para el buscador de comentarios
        //$comentarios=Comentarios::Search($request->comentarios)->orderBy("id","DESC")->paginate(5);

        $comentarios=Comentarios::Search($request->comentarios)->orderBy('id','DESC')->paginate(5);

        /*traemos las relaciones con articulo y user*/
        $comentarios->each(function($comentarios){
            
            $comentarios->article;
            $comentarios->user;
        });

        //dd($comentarios);

        //devolvemos la lista de comentarios
        return View('admin.comentarios.listacomentarios')->with('comentarios',$comentarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $comentarios = Comentarios::find($id);

        return View('admin.comentarios.edit')->with('comentarios',$comentarios);
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
        $comentarios = Comentarios::find($id);

        $comentarios->fill($request->all());
        $comentarios->save();

        flash('El comentario '.$comentarios->comentarios.' se ha actualizado correctamente')->important();

        return redirect()->route('comentarios.listacomentarios');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        $comentarios = Comentarios::find($id);
        $comentarios->delete();


         flash('El comentario '.$comentarios->comentarios.' se ha eliminado correctamente')->error()->important();

          return redirect()->route('comentarios.listacomentarios');
    }
}
