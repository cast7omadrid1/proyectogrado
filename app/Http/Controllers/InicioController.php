<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    /*en referencia a los .blade*/
    public function inicio()
    {
        return view('index');
    }
}


