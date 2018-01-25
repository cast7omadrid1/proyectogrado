<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class PlantillaMasterController extends Controller
{
    
    public function plantillamaster(){
        return view('plantillamaster');
    }
}