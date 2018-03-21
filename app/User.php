<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    //un user puede tener varios articulos
    public function articles(){

        return $this->hasMany('App\Article');

    }


    //un user puede tener varios comentarios
    public function comentario(){

        return $this->hasMany('App\Comentarios');
        //return $this->hasMany('Comentarios::class');
    }


    public function scopeSearch($query, $name){

        //nombre  de la columna donde busca, 'como', contenido que va a buscar
        return $query->where('name','LIKE',"%$name%");

    }


}


