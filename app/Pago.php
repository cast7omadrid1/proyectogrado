<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pagos";

    protected $fillable = ['cantidad','socio_id'];

    //un pago pertenece a un solo usuario
    public function user(){

    	return $this->belongsTo('App\User','socio_id','socio');

    }


	public function scopeSearch($query, $pagos){

        //nombre  de la columna donde busca, 'como', contenido que va a buscar
        return $query->where('socio_id','LIKE',"%$pagos%");

    }


}
