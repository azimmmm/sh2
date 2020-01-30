<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Payment;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function verify(Request $request,$id)
    {
//        dd($request,$id);
        $cart=Session::has('cart')?Session::get('cart'):null;
//        dd($cart);
$payment=new Payment($cart->totalPrice);
$result=$payment->verifyPayment($request->Authority,$request->Status);
//dd($result);
        if($result){
            $order=Order::findOrFail($id);
            $order->status=1;
            $order->save();
            $newPayment=new Payment($cart->totalPrice);
            $newPayment->authority=$request->Authority;
            $newPayment->status=$request->Status;
            $newPayment->RefID=$result->RefID;
            $newPayment->order_id=$id;
            $newPayment->save();
            Session::forget('cart');
            Session::flash('success','پرداخت با موفقیت انجام شد کد رهگیری شما:'.$newPayment->RefID);
            return redirect('/profile');
        }else{
            Session::flash('failpay','پرداخت انجام نشد مجدد اقدام نمایید ');
            return redirect('/cart');
        }
}
}
