<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function Shop_list(){
        return view('shop.Shop_list');
    }
    public function Shops_Audit(){
        return view('shop.Shops_Audit');
    }
    public function shopping_detailed(){
        return view('shop.shopping_detailed');
    }
}
