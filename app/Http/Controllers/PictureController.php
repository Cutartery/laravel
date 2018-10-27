<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function advertising()
    {
        return view('picture.advertising');
    }
    public function Sort_ads()
    {
        return view('picture.Sort_ads');
    }
    public function Ads_list()
    {
        return view('picture.Ads_list');
    }
}
