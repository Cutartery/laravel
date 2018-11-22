<?php

namespace App\Http\Controllers\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingController extends Controller
{
    public function goods_getOrderinfo()
    {
        return view('goods.Shopping.getOrderinfo');
    }
    public function goods_success_cart()
    {
        return view('goods.Shopping.success_cart');
    }
    public function goods_cart()
    {
        return view('goods.Shopping.cart');
    }
}
