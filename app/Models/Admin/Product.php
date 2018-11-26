<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['pro_name','brand_id','ify_id1','ify_id2','ify_id3','pro_content'];

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
