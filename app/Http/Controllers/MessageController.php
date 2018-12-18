<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
   function list(){
       return view('message.list');
   }
   function send(){
       return view('message.send');
   }
   function content(){
       return view('message.content');
   }
}
