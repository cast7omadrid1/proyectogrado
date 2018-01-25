<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class EventospenaController extends Controller
{
    
    public function eventospena(){
        return view('eventospena');
    }
}