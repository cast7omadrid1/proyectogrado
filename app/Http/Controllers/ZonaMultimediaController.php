<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use App\Category;
use App\Article;
use App\Http\Controllers\Controller;

class ZonaMultimediaController extends Controller
{
    
    public function zonamultimedia(){
        return view('zonamultimedia');
    }
}