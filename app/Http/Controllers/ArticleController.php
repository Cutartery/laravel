<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function article_list(){
        return view('article.article_list');
    }
    public function article_Sort(){
        return view('article.article_Sort');
    }
    public function article_add(){
        return view('article.article_add');
    }
}
