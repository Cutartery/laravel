<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VipController extends Controller
{
    public function user_list()
    {
        return view('admin.vip.user_list');
    }
    public function member_Grading()
    {
        return view('admin.vip.member_Grading');
    }
    public function integration()
    {
        return view('admin.vip.integration');
    }
}
