<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ding extends Model
{
    protected $fillable = ['user_id','blog_id'];
    public $timestamps = false;
}
