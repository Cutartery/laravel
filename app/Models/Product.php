<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['img_title','titles','number','place','material','brand','height','zprice','sprice','keyword','content','file','scontent','img'];

    //页面显示商品添加
    public function doproducts_List()
    {
        $data = Product::get();
         return $data;
    }
    //页面显示商品修改
    public function member_add($id)
    {
        $data = Product::where('id',$id)->first();
        return $data;
    }
    public static function del_goods($data){
        
        foreach($data as $v){
            Product::destroy($v);
        }
    }
}
