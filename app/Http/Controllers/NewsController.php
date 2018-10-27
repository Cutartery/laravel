<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function Guestbook(){
        return view('news.Guestbook');
    }
    public function Feedback(){
        return view('news.Feedback');
    }
}
