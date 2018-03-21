<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = ['title','description','user_id','category_id'];

    //un articulo es de un solo usuario
    public function user(){

    	return $this->belongsTo('App\User');

    }


    //un articulo puede contener una sola categoria
    public function category(){

        return $this->belongsTo('App\Category');

    }


    //un articulo puede contener varias imagenes
    public function image(){

    	return $this->hasMany('App\Image');

    }


    public function tags(){

        return $this->belongsToMany('App\Tag');


    }

    //un articulo puede tener varios comentarios
    public function comentario(){

        return $this->hasMany('App\Comentarios');
          //return $this->hasMany('Comentarios::class');
    }


    public function scopeSearch($query, $title){

        //nombre  de la columna donde busca, 'como', contenido que va a buscar
        return $query->where('title','LIKE',"%$title%");

    }

}
