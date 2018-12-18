<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommetnRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    function doadd(CommentRequest $req){
        $comment = new Comment;
        $comment->fill($req->all());
        $comment->user_id = session('id');
        $comment->save();
        return $comment;
    }
    function index($blog_id){
        return Comment::where('blog_id',$blog_id)
                        ->orderBy('id','desc')
                        ->with('user')
                        ->paginate(5);
    }
}



