<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transaction()
    {
        return view('admin.transaction.transaction');
    }
    public function Order_Chart()
    {
        return view('admin.transaction.Order_Chart');
    }
    public function Orderform()
    {
        return view('admin.transaction.Orderform');
    }
    public function Amounts()
    {
        return view('admin.transaction.Amounts');
    }
    public function Order_handling()
    {
        return view('admin.transaction.Order_handling');
    }
    public function Refund()
    {
        return view('admin.transaction.Refund');
    }
    public function order_detailed()
    {
        return view('admin.transaction.order_detailed');
    }
    public function Refund_detailed()
    {
        return view('admin.transaction.Refund_detailed');
    }
}
