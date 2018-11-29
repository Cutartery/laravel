<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    public $timestamps = false;
    protected $fillable = ['attr_attr','sku_id','attr_val'];
    //
}
