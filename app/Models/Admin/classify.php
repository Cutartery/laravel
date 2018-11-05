<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class classify extends Model
{
    protected $fillable = ['ify_name','ify_pid','ify_path'];

    public function doproduct_category_index()
    {
       return classify::get();
    }
    public function picture_add()
    {
        $data = classify::where('ify_pid',0)->get();
        return $data;
    }
    public function ajaxpicture_add($req)
    {
        $data = classify::where('ify_pid',$req->id)->get();
        return $data;
    }
}
