<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PictureController extends Controller
{
    public function advertising()
    {
        return view('admin.picture.advertising');
    }
    public function Sort_ads()
    {
        return view('admin.picture.Sort_ads');
    }
    public function Ads_list()
    {
        return view('admin.picture.Ads_list');
    }
}
