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


}
