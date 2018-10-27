<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction()
    {
        return view('transaction.transaction');
    }
    public function Order_Chart()
    {
        return view('transaction.Order_Chart');
    }
    public function Orderform()
    {
        return view('transaction.Orderform');
    }
    public function Amounts()
    {
        return view('transaction.Amounts');
    }
    public function Order_handling()
    {
        return view('transaction.Order_handling');
    }
    public function Refund()
    {
        return view('transaction.Refund');
    }
    public function order_detailed()
    {
        return view('transaction.order_detailed');
    }
    public function Refund_detailed()
    {
        return view('transaction.Refund_detailed');
    }
}
