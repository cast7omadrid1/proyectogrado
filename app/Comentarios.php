<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = "comentarios";

    protected $fillable = ['comentarios','articulo_id','usuario_id'];


    //un comentario es de un solo usuario
    public function user(){

        return $this->belongsTo('App\User');

    }

    //un comentario es de un solo articulo
    public function articles(){

        return $this->belongsTo('App\Article');

    }





}
