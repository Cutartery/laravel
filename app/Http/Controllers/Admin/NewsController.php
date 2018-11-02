<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class NewsController extends Controller
{
    public function Guestbook(){
        return view('admin.news.Guestbook');
    }
    public function Feedback(){
        return view('admin.news.Feedback');
    }
}
