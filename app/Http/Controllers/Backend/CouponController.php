<?php

namespace App\Http\Controllers\Backend;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupon::paginate(10);
        return view('viewbackend.coupon.index',compact(['coupons']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewbackend.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon=new Coupon();
        $coupon->title= $request->input('title');
        $coupon->code= $request->input('code');
        $coupon->status= $request->input('status');
        $coupon->price= $request->input('price');
        $coupon->save();
        Session::flash('add_coupon', 'تخفیف با موفقیت ثبت شد');
        return redirect('/main/coupons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $coupon=Coupon::findOrFail($id);
       return view('viewbackend.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {$coupon=Coupon::findOrFail($id);
        $coupon->title= $request->input('title');
        $coupon->code= $request->input('code');
        $coupon->status= $request->input('status');
        $coupon->price= $request->input('price');
        $coupon->save();
        Session::flash('add_coupon', 'تخفیف با موفقیت ویرایش شد');
        return redirect('/main/coupons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon=Coupon::findOrFail($id);
        $coupon->delete();

        Session::flash('delete_coupon', 'کد تخفیف حذف شد.');

        return redirect('/main/coupons');
    }
}
