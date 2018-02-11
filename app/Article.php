<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = ['title','description','user_id'];

    //un articulo es de un solo usuario
    public function user(){

    	return $this->belongsTo('App\User');

    }

    //un articulo puede contener varias imagenes
    public function image(){

    	return $this->hasMany('App\Image');

    }


    public function scopeSearch($query, $title){

        //nombre  de la columna donde busca, 'como', contenido que va a buscar
        return $query->where('title','LIKE',"%$title%");

    }


}
