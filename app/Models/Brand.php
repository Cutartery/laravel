<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['title','serial','file','place','brand','status'];

    public function add_Brand()
    {
        
    }
}
