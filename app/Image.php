<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";

    protected $fillable = ['name','article_id'];

    //una imagen solo puede pertenecer a un articulo
    public function article(){

    	return $this->belongsTo('App\Article');
    }

    public function scopeSearch($query, $name){

        //nombre  de la columna donde busca, 'como', contenido que va a buscar
        return $query->where('name','LIKE',"%$name%");

    }
}
