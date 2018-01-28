<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    public function addimage(){
        return view('addimage');
    }
}

