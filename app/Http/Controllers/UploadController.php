<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    function upload(Request $req){
        $req->validate([
            'logo'=>'required |image | max:2048'
        ],[
            'logo.required'=>'必须上传图片',
            'logo.image'=>'只能上传jpeg,png,bmp,gif,or svg格式的图片',
            'logo.max'=>'图片最大不能超过2M',
        ]);
        if($req->hasFile('logo') && $req->logo->isValid()){
            $date = date('Ymd');
            $newImage = $req->logo->store($date,'uploads');
            dd($newImage);
        }
    }
}
