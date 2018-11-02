<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function Shop_list(){
        return view('admin.shop.Shop_list');
    }
    public function Shops_Audit(){
        return view('admin.shop.Shops_Audit');
    }
    public function shopping_detailed(){
        return view('admin.shop.shopping_detailed');
    }
}
