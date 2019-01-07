<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

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
    public function index_cate()
    {
        $data = self::get();
        $data = $data->toArray();
        $classify = new self;
        $data = $classify->grade($data);
        return $data;
    }
    public function grade($data,$pid=0,$level=0)
    {
        $res = [];
        foreach($data as $v){
            if($v['ify_pid']==$pid)
            {
                $v['level']=$level;
                $v['child']=$this->grade($data,$v['id'],$level+1);
                $res[]=$v;
            }
        }
        return $res;        
    }
    public function goods_search($id){
        $data = DB::table('products as pro')
        ->select('sku.id as sku_id','img.bg_image','sku.sku_price','sku.name')
        ->leftJoin('skus as sku','sku.pro_id','=','pro.id')
        ->leftJoin('images as img','img.sku_id','=','sku.id')
        ->groupBy('pro.id')
        ->where('pro.ify_id3',$id)
        ->paginate(2);
        return $data;

    }
    public function goods_item($id){
        $data = DB::table('products as pro')
        ->leftJoin('skus as sku','sku.pro_id','=','pro.id')
        ->leftJoin('images as img','img.sku_id','=','sku.id')
        ->leftJoin('attributes as att','att.sku_id','=','sku.id')
        ->groupBy('sku.id')
        ->where('sku.id',$id)
        ->get();
        return $data;
    }

    public function ajax_item($id){
        $data = DB::table('products as pro')
        ->leftJoin('skus as sku','sku.pro_id','=','pro.id')
        ->leftJoin('images as img','img.sku_id','=','sku.id')
        ->leftJoin('attributes as att','att.sku_id','=','sku.id')
        ->groupBy('sku.id')
        ->where('sku.id',$id)
        ->get();
        return $data;
    }





}
