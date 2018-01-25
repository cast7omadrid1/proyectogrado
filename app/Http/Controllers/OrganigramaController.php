<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class OrganigramaController extends Controller
{
    
    public function organigrama(){
        return view('organigrama');
    }
}