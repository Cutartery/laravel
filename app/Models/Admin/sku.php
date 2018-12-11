<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class sku extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','title','pro_id','sku_price','sku_stock'];
    //
}
