<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    public $timestamps = false;
    protected $fillable = ['pro_id','bg_image','md_image','sm_image'];
}
