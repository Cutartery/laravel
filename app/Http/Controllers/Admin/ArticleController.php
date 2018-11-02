<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ArticleController extends Controller
{
    public function article_list(){
        return view('admin.article.article_list');
    }
    public function article_Sort(){
        return view('admin.article.article_Sort');
    }
    public function article_add(){
        return view('admin.article.article_add');
    }
}
