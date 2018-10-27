<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function Systems(){
        return view('system.Systems');
    }
    public function System_section(){
        return view('system.System_section');
    }
    public function System_Logs(){
        return view('system.System_Logs');
    }
}
