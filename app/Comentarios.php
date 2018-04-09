<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $table = "comentarios";

    protected $fillable = ['comentarios','articulo_id','usuario_id'];


    //un comentario es de un solo usuario
    public function user(){

        return $this->belongsTo('App\User','usuario_id');
        //return $this->belongsTo(User::class,'id');
    }

    //un comentario es de un solo articulo
    public function article(){

        return $this->belongsTo('App\Article','articulo_id');
        //return $this->belongsTo(Article::class,'id');
    }


    public function scopeSearch($query, $comentarios){

        //nombre  de la columna donde busca, 'como', contenido que va a buscar
        return $query->where('comentarios','LIKE',"%$comentarios%");

    }


}
