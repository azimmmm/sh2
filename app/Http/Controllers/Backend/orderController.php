<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {$orders=Order::paginate(10);
    return view('viewbackend.orders.index',compact('orders'));

    }
}
