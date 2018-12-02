<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\classify;
use Storage;
class GoodsController extends Controller
{

    //前台首页
    public function goods_index()
    {
        $class = new classify;
        $data = $class->index_cate();
        // dd($data);
        return view('goods.good.index',[
            'data' => $data
            ]);
    }


    //向前台传输数据
    public function goods_search(){
        $id = $_GET['id'];
        $class = new classify;
        $data = $class->goods_search($id);
        // dd($data);
        return view('goods.good.search',[
            'data' => $data,
            'id' => $id
        ]);
    }


    //前台详情页
    public function goods_item(){
        $id = $_GET['sku_id'];
        $class = new classify;
        $data = $class->goods_item($id);
        // dd($data);
        return view('goods.good.item',['data'=>$data]);
    }
}
