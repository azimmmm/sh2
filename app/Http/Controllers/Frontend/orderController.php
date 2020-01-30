<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class orderController extends Controller
{
    public function verify()
    {

        $cart = Session::has('cart') ? Session::get('cart') : null;
        if (!$cart) {
            Session::flash('empty', ' سبد خرید خالی است');
            return redirect('/');
        }

        $productsId = [];
        foreach ($cart->items as $product) {
            $productsId[$product['item']->id] = ['number' => $product['number']];
        }

        $order = new Order();
        $order->amount = $cart->totalPrice;
        $order->status = 0;
        $order->user_id = Auth::user()->id;
        $order->save();
        $order->products()->sync($productsId);

        $payment = new Payment($order->amount, $order->id);
        $result = $payment->doPayment();

        if ($result->Status == 100) {

            return redirect('https://sandbox.zarinpal.com/pg/StartPay/'. $result->Authority);


        } else {
            echo 'ERR: ' . $result->Status;
        }
    }
}
