<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function Cover_management()
    {
        return view('payment.Cover_management');
    }
    public function payment_method()
    {
        return view('payment.payment_method');
    }
    public function Payment_Configure()
    {
        return view('payment.Payment_Configure');
    }
    public function Account_Details()
    {
        return view('payment.Account_Details');
    }
    public function Payment_details()
    {
        return view('payment.Payment_details');
    }
}
