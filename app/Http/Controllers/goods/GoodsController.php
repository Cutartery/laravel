<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function goods_index()
    {
        return view('goods.good.index');
    }
    public function goods_item(){
        return view('goods.good.item');
    }
    public function goods_search(){
        return view('goods.good.search');
    }
}
