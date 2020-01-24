<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function addCoupon(Request $request)
    {
    //منتشر شده بررسی شود.

        $check = Auth::user()->whereHas('coupons', function ($q) use ($request) {
            $q->where('code', $request->code);
        })->exists();

        if (!$check) {
            $coupon = Coupon::where('code', $request->code)->first();
            $cart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($cart);
            $cart->addCoupon($coupon);
            $request->session()->put('cart', $cart);
            $user = Auth::user();
            $user->coupons()->attach($coupon->id);
            $user->save();
//            dd(Session::get('cart'));
            return back();
        } else {
            Session::flash('addcoupon', 'شما قبلا از این کد تخفیف استفاده کرده اید ');
            return redirect('/cart');

        }

    }
}