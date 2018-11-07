<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    public $timestamps = false;
    protected $fillable = ['pro_id','attr_attr','attr_val','image_id'];
    //
}
