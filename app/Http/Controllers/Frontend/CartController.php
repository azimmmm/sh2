<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Product;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
//        dd(Session::get('cart'));
        $product = Product::with('photo')->where('id', $id)->first();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);


        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);

//        dd( $request->session()->get('cart')->items);
        return back();
    }

    public function remove(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
//        dd($oldCart);
        $cart = new Cart($oldCart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);

        return back();

    }

    public function getCart()

    {
        if (Auth::user()) {
            $cart = Session::has('cart') ? Session::get('cart') : null;
            return view('viewfrontend.cart.index', compact('cart'));
        } else {
            Session::flash('userauth','برای تکمیل عملیات خرید باید وارد حساب کاربری خود شوید');
            return view('Auth.login', compact('cart'));
        }
    }
}