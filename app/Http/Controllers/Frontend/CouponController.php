<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Coupon;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    protected $redirectTo = '/login';



    public function __construct()
    {
        $this->middleware('Authenticate');
    }



    public function addCoupon(Request $request)
    {
        App::setLocale('fa');

        $validator = Validator::make($request->all(), [
            'coupon' => ['required', 'max:255']
        ]);
        if ($validator->passes()) {
            //منتشر شده بررسی شود.
            $exist = Coupon::all()->firstWhere('code', $request->coupon);
            if ($exist != null) {

                $check = Auth::user()->whereHas('coupons', function ($q) use ($request) {
                    $q->where('code', $request->coupon);
                })->exists();

                if (!$check) {
                    $coupon = Coupon::where('code', $request->coupon)->first();
                    $cart = Session::has('cart') ? Session::get('cart') : null;
                    $cart = new Cart($cart);
                    $cart->addCoupon($coupon);
                    $request->session()->put('cart', $cart);
                    $user = Auth::user();
                    $user->coupons()->attach($coupon->id);
                    $user->save();
//            Session::flash('success', 'شما قبلا از این کد تخفیف استفاده کرده اید ');
                    return response()->json(['success' => ['coupon'=>'کوپن در سبد خرید اعمال شد']]);

                } else {
                    Return response()->json(['error' => ['coupon'=>'این کد تخفیف قبلا استفاده شده است']]);
                }

            } else {

                Return response()->json(['error' => ['coupon'=>'کد تخفیف اشتباه وارد شده است']]);
            }
        } else {
//    Session::flash('error', 'کد تخفیف وارد شده معتبر نیست ');
//    return redirect('/cart');

            Return response()->json(['error' => $validator->errors()->all()]);

        }
    }
}