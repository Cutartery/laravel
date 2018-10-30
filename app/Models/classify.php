<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classify extends Model
{
    protected $fillable = ['ify_name','ify_pid','ify_path'];

    public function doproduct_category_add()
    {
       return classify::where('ify_path','-')->orwhere('ify_path','like','-_-')->get();
    }
    public function doproduct_category_index()
    {
       return classify::get();
    }
}
