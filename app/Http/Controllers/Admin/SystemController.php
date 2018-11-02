<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function Systems(){
        return view('admin.system.Systems');
    }
    public function System_section(){
        return view('admin.system.System_section');
    }
    public function System_Logs(){
        return view('admin.system.System_Logs');
    }
}
