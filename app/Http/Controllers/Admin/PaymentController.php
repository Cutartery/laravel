<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PaymentController extends Controller
{
    public function Cover_management()
    {
        return view('admin.payment.Cover_management');
    }
    public function payment_method()
    {
        return view('admin.payment.payment_method');
    }
    public function Payment_Configure()
    {
        return view('admin.payment.Payment_Configure');
    }
    public function Account_Details()
    {
        return view('admin.payment.Account_Details');
    }
    public function Payment_details()
    {
        return view('admin.payment.Payment_details');
    }
}
