<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table="tags";

   	protected $fillable = ["name"];

   	public function articles(){

   		return $this->belongsToMany('App\Article')->withTimestamps();//para problemas con el tiempo de creación y actualización

   	}

   	public function scopeSearchTag($query,$name){

   		return $query->where('name','=',$name);
   
   	}

   	public function scopeSearch($query, $name){

        //nombre  de la columna donde busca, 'como', contenido que va a buscar
        return $query->where('name','LIKE',"%$name%");

   }


}
