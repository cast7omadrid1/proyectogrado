<?php

namespace App\Http\Controllers;

//use App\User;
use App\Http\Controllers\Controller;

class UserloginController extends Controller
{
    
    public function userlogin(){
        return view('userlogin');
    }
}

