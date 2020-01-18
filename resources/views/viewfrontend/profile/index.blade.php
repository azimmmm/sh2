@extends('viewfrontend.layouts.master')
<!--Right Part Start -->
@section('maincontent')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success">

            {{session('success')}}
        </div>
    @endif
    <div class="row">
        <div id="column-right" class="col-sm-9 hidden-xs">
    <h3 class="subtitle">حساب کاربری</h3>
            <p class="alert alert-success">{{$user->name.' '.$user->last_name}} خوش آمدید .</p>

    <div class="list-group">
        <ul class="list-item">

            <li><a href="#">لیست آدرس ها</a></li>
            <li><a href="wishlist.html">لیست علاقه مندی</a></li>
            <li><a href="#">تاریخچه سفارشات</a></li>
            <li><a href="#">دانلود ها</a></li>
            <li><a href="#">امتیازات خرید</a></li>
            <li><a href="#">بازگشت</a></li>
            <li><a href="#">تراکنش ها</a></li>
            <li><a href="#">خبرنامه</a></li>
            <li><a href="#">پرداخت های تکرار شونده</a></li>
        </ul>
    </div>
        </div>
    </div>
    @endsection