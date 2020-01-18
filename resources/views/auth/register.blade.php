@extends('viewfrontend.layouts.master')

@section('maincontent')
    <div class="row">
        <!--Middle Part Start-->
        <div class="col-sm-9" id="content">
            <h1 class="title">ثبت نام حساب کاربری</h1>
            <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="{{route('login')}}">صفحه لاگین</a> مراجعه
                کنید.</p>
            <form class="form-horizontal" method="post" action="{{route('register-user')}}">
                @csrf
                <fieldset id="account">
                    <legend>اطلاعات شخصی شما</legend>
                    <div class="form-group required">
                        <label for="input-name" class="col-sm-2 control-label">نام</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-name" placeholder="نام" value=""
                                   name="name">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی"
                                   value="" name="lastname">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value=""
                                   name="email">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-telephone" class="col-sm-2 control-label">شماره تلفن</label>
                        <div class="col-sm-10">
                            <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن"
                                   value="" name="phone">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-nationalcode" class="col-sm-2 control-label">کدملی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-nationalcode" placeholder="کدملی" value="" name="national_code">
                        </div>
                    </div>
                </fieldset>
                <fieldset id="address">
                    <legend>آدرس</legend>
                    <div class="form-group required">
                        <label for="state" class="col-sm-2 control-label">استان</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="state" id="state" >
                                <option value="">استان را انتخاب کنید</option>
@foreach($states as $key=>$value)
    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="city" class="col-sm-2 control-label">شهر</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city" name="city">
                                <option value=""> --- لطفا انتخاب کنید ---</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-address" class="col-sm-2 control-label">آدرس </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-address" placeholder="آدرس" value=""
                                   name="address">
                        </div>
                    </div>

                    <div class="form-group required">
                        <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-postcode" placeholder="کد پستی" value=""
                                   name="postcode">
                        </div>
                    </div>

                </fieldset>
                <fieldset>
                    <legend>رمز عبور شما</legend>
                    <div class="form-group required">
                        <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-password" placeholder="رمز عبور"
                                   value="" name="password">
                        </div>
                    </div>
                    <div class="form-group required">
                        <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور"
                                   value="" name="confirm">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>خبرنامه</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">اشتراک</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" value="1" name="newsletter">
                                بله</label>
                            <label class="radio-inline">
                                <input type="radio" checked="checked" value="0" name="newsletter">
                                نه</label>
                        </div>
                    </div>
                </fieldset>
                <div class="buttons">
                    <div class="pull-right">
                        <input type="checkbox" value="1" name="agree">
                        &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a>
                        &nbsp;
                        <input type="submit" class="btn btn-primary" value="ادامه">
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End -->
        <!--Right Part Start -->

        <!--Right Part End -->
    </div>
    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    {{--<div class="card">--}}
    {{--<div class="card-header">{{ __('Register') }}</div>--}}

    {{--<div class="card-body">--}}
    {{--<form method="POST" action="{{ route('register') }}">--}}
    {{--@csrf--}}

    {{--<div class="form-group row">--}}
    {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

    {{--@error('name')--}}
    {{--<span class="invalid-feedback" role="alert">--}}
    {{--<strong>{{ $message }}</strong>--}}
    {{--</span>--}}
    {{--@enderror--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row">--}}
    {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">--}}

    {{--@error('email')--}}
    {{--<span class="invalid-feedback" role="alert">--}}
    {{--<strong>{{ $message }}</strong>--}}
    {{--</span>--}}
    {{--@enderror--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row">--}}
    {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

    {{--@error('password')--}}
    {{--<span class="invalid-feedback" role="alert">--}}
    {{--<strong>{{ $message }}</strong>--}}
    {{--</span>--}}
    {{--@enderror--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row">--}}
    {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

    {{--<div class="col-md-6">--}}
    {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group row mb-0">--}}
    {{--<div class="col-md-6 offset-md-4">--}}
    {{--<button type="submit" class="btn btn-primary">--}}
    {{--{{ __('Register') }}--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

@endsection

@section('scripts')
    <script>
    $(document).ready(function () {
        $('select[name="state"]').on('change',function () {
            var state_id=$(this).val();
            console.log(state_id);
            if(state_id){
              $.ajax({
                  url:'/register2/getCities/'+state_id,
                  type:'GET',
                  dataType:'json',
                  success:function (data) {
                      console.log(data);
                      $('select[name="city"]').empty();
$.each(data,function(key,value){
    $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
});
                  }
              });
            }else {
                $('select[name="state"]').empty();
            }

        });

    });
    </script>
@endsection