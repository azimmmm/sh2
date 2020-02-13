@extends('viewfrontend.layouts.master')
@section('maincontent')
    <div id="container">
        <div class="container">
        @if(Session::has('cart'))
            <!-- Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                    <li><a href="#">سبد خرید</a></li>
                </ul>
                <!-- Breadcrumb End-->
                <div class="row">
                    @if(Session::has('failpay'))
                        <div class="alert alert-warning">
                            {{session('failpay')}}
                        </div>

                @endif
                <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h1 class="title">سبد خرید</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td class="text-center">تصویر</td>
                                    <td class="text-left">نام محصول</td>
                                    <td class="text-left">شناسه کالا</td>
                                    <td class="text-left">تعداد</td>
                                    <td class="text-right">قیمت واحد</td>
                                    <td class="text-right">کل</td>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($cart->items as $product)
                                    <tr>
                                        <td class="text-center" style="width: 15%"><a href="#"><img
                                                        src="{{$product['item']->photo->path}}"
                                                        alt="{{$product['item']->title}}"
                                                        title="{{$product['item']->title}}" class="img-thumbnail"/></a>
                                        </td>
                                        <td class="text-left"><a href="">{{$product['item']->title}}</a><br/>
                                            <small>{{$product['item']->short_desc?$product['item']->short_desc:null}}</small>
                                        </td>
                                        <td class="text-left">{{$product['item']->sku}}</td>
                                        <td class="text-left">
                                            <div class="input-group btn-block quantity">
                                                <p>{{$product['number']}}</p>
                                                <span class="input-group-btn">
                                            <a class="btn btn-primary" data-toggle="tooltip" title="اضافه"
                                               href="{{route('cart.add',['id'=>$product['item']->id])}}"><i
                                                        class="fa fa-plus"></i></a>

                        <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger"
                                onclick="event.preventDefault();
                                        document.getElementById('remove-item_{{$product['item']->id}}').submit();"><i
                                    class="fa fa-minus"></i></button>
                                             <form id="remove-item_{{$product['item']->id}}"
                                                   action="{{ route('cart.remove',['id'=>$product['item']->id]) }}"
                                                   method="post" style="display: none;">
                                                            @csrf
                                                        </form>
                        </span></div>
                                        </td>
                                        <td>{{$product['item']->discount_price?$product['item']->discount_price:$product['item']->price}}

                                        </td>
                                        <td class="text-right">{{$product['price']}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
                        <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                {{--@if(\Illuminate\Support\Facades\Session::has('addcoupon'))--}}
                                    {{--<div class="alert alert-warning">--}}
                                        {{--{{session('addcoupon')}}--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                                <div class="alert alert-warning print-error-msg" style="display:none">

                                    <ul></ul>

                                </div>
                                <div class="alert alert-success print-success-msg" style="display:none">

                                    <ul></ul>

                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                                    </div>
                                    <div id="collapse-coupon" class="panel-collapse collapse in">
                                        <div class="panel-body">

                                            <label class="col-sm-4 control-label" for="coupon">کد تخفیف خود را در اینجا
                                                وارد کنید</label>

                                            <form>
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" name="code"
                                                           placeholder="کد تخفیف خود را در اینجا وارد کنید" id="coupon"
                                                           class="form-control"/>
                                                    <span class="input-group-btn">
                                                <button type="submit" class="btn btn-primary btn-coupon">اعمال کوپن</button>
                      </span></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-sm-offset-2">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-right"><strong>جمع کل:</strong></td>
                                        <td class="text-right">{{\Illuminate\Support\Facades\Session::get('cart')->totalPurePrice}}
                                            تومان
                                        </td>
                                    </tr>
                                    {{--<tr>--}}
                                    {{--@if(Session::get('cart')->couponDis)--}}
                                    {{--<td class="text-right"><strong>:{{Session::get('cart')->couponDis->coupon->title}}</strong></td>--}}
                                    {{--<td class="text-right">{{Session::get('cart')->couponDis}}--}}
                                    {{--@endif--}}
                                    {{--تومان--}}
                                    {{--</td>--}}
                                    {{--</tr>--}}
                                    <tr>
                                        <td class="text-right"><strong>کسر هدیه:</strong></td>
                                        <td class="text-right">{{\Illuminate\Support\Facades\Session::get('cart')->totalDisPrice}}
                                            تومان
                                        </td>
                                    </tr>
                                    @if(\Illuminate\Support\Facades\Auth::check() && Session::get('cart')->couponDis)
                                        {{--                                @dd(\Illuminate\Support\Facades\Session::get('cart')->coupon)--}}
                                        {{--@foreach( Session::get('cart')->coupons as $coupon)--}}

                                        <tr>
                                            <td

                                                    class="text-right"><strong>مبلغ کوپن ها:</strong></td>
                                            <td class="text-right">{{\Illuminate\Support\Facades\Session::get('cart')->couponDis}}
                                                تومان
                                            </td>
                                        </tr>
                                        {{--@foreach--}}

                                    @endif

                                    <tr>
                                        <td class="text-right"><strong>قابل پرداخت:</strong></td>
                                        <td class="text-right">{{\Illuminate\Support\Facades\Session::get('cart')->totalPrice}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>


                    </div>
                    <div class="buttons">
                        <div class="pull-left"><a href="index.html" class="btn btn-default">ادامه خرید</a></div>
                        <div class="pull-right"><a href="{{route('order.verify')}}" class="btn btn-primary">تسویه
                                حساب</a></div>
                    </div>
                </div>
            @else
                <td class="text-center">
                    <button class="btn btn-danger btn-xs " type="button" title="صفحه اصلی"
                            onclick="event.preventDefault();
                                    document.getElementById('home').submit();"><i class="fa fa-times"></i>
                        صفحه اصلی
                    </button>

                    <form id="home" action="{{ url('/') }}" method="get" style="display: none;">
                        @csrf
                    </form>
                </td>
        @endif
        <!--Middle Part End -->
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">


        $(document).ready(function () {

            $(".btn-coupon").click(function (e) {

                e.preventDefault();


                var _token = $("input[name='_token']").val();

                var coupon = $("input[name='code']").val();


                console.log(_token);
                console.log(coupon);

                $.ajax({

                    url: "{{route('coupon.add')}}",

                    type: 'POST',

                    data: {
                        _token: _token,
                        coupon: coupon,

                    },

                    success: function (data) {
console.log(data);
                        if ($.isEmptyObject(data.error)) {

                            printSuccessMsg(data.success);

                        } else {

                            printErrorMsg(data.error);

                        }

                    }

                });


            });


            function printErrorMsg(msg) {

                $(".print-error-msg").find("ul").html('');

                $(".print-error-msg").css('display', 'block');

                $.each(msg, function (key, value) {

                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');

                });

            }
            function printSuccessMsg(msg) {

                $(".print-success-msg").find("ul").html('');

                $(".print-success-msg").css('display', 'block');

                $.each(msg, function (key, value) {

                    $(".print-success-msg").find("ul").append('<li>' + value + '</li>');

                });

            }

        });


    </script>
@endsection