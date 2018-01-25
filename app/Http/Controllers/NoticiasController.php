<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class NoticiasController extends Controller
{
    
    public function noticias(){
        return view('noticias');
    }
}