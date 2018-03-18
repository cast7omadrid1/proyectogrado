<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table="categories";

   protected $fillable = ["name"];

   //una categoria pertenece a varios articulos
   public function articles(){

   		return $this->hasMany('App\Article');

   }


   public function scopeSearchCategory($query,$name){

   	return $query->where('name','=',$name);
   }


   public function scopeSearch($query, $name){

        //nombre  de la columna donde busca, 'como', contenido que va a buscar
        return $query->where('name','LIKE',"%$name%");

   }

}
