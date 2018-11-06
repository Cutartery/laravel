<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class sku extends Model
{
    public $timestamps = false;
    protected $fillable = ['pro_id','attr_id','sku_price','sku_stock','image_id'];
    //
}
