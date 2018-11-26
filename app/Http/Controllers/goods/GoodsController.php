<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\classify;
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
        return view('goods.good.search');
    }
}
