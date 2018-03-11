<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Tag;
use Laracast\Flash\Flash;

class TagsController extends Controller
{
    /**
     * Mostrar lista de tags
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //usamos el metodo Search para el buscador de tags

        $tags=Tag::Search($request->name)->orderBy("id","ASC")->paginate(2);
        return view('admin.tags.listatags')->with('tags',$tags);

    }

    /**
     * Mostrar el formulario de creacion de tags.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Guardar los cambios realizados al añadir un tag
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tags = new Tag($request->all());
        $tags->save();
        
        flash('El tag '.$tags->name.' se ha creado correctamente')->success();

        return redirect()->route('tags.listatags');
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
     * Mostrar él formulario de edicción de tags
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.edit')->with('tag',$tag);
    }

    /**
     * Actualizar los tags editados
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        //reemplazamos los datos con los datos obtenidos del formulario
        $tag->fill($request->all());
        $tag->save();

        flash('El tag '.$tag->name.' se ha actualizado correctamente')->important();

        return redirect()->route('tags.listatags');
    }

    /**
     * Borrar un tag especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        $tag->delete();
        
        flash('El tag '.$tag->name.' se ha eliminado correctamente')->error()->important();
       
        return redirect()->route('tags.listatags');
    }
}
