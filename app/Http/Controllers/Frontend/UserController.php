<?php

namespace App\Http\Controllers\Frontend;
use App\Address;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $user=new User();
        $user->name = $request->input('name');
        $user->last_name = $request->input('lastname');
        $user->national_code =$request->input('national_code');
        $user-> email =$request->input('email');
        $user-> phone =$request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $address=new Address();
        $address-> address =$request->input('address');
        $address-> state_id =$request->input('state');
        $address-> city_id =$request->input('city');
        $address-> post_code =$request->input('postcode');
        $address-> user_id =$user->id ;
        $address->save();
        session::flash('success','ثبت نام با موفقیت انجام شد ,لطفا حساب کاربری خود را تاییید کنید');
        return redirect('/login');


 }

    public function profile()
    {
        $user=Auth::user();
        return view('viewfrontend.profile.index',compact(['user']));

 }
}
