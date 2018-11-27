<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\classify;
use Storage;
class GoodsController extends Controller
{
    public function goods_index()
    {
        $class = new classify;
        $data = $class->index_cate();
        // dd($data);
        return view('goods.good.index',[
            'data' => $data
            ]);
    }
    public function goods_item(){
        return view('goods.good.item');
    }
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
}
