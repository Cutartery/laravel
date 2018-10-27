<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VipController extends Controller
{
    public function user_list()
    {
        return view('vip.user_list');
    }
    public function member_Grading()
    {
        return view('vip.member_Grading');
    }
    public function integration()
    {
        return view('vip.integration');
    }
}
