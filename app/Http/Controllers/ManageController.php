<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function admin_Competence(){
        return view('manage.admin_Competence');
    }
    public function administrator(){
        return view('manage.administrator');
    }
    public function admin_info(){
        return view('manage.admin_info');
    }
    public function Competence(){
        return view('manage.Competence');
    }

}
