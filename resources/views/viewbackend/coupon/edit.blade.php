@extends('viewbackend.layouts.master')'
@section('styles')

@endsection
@section('main-content')
    <div class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="p-b-3  text-center">ویرایش </h3>
                @include('viewbackend.partials.form-errors')
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/main/coupons/{{$coupon->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group">
                                <label for="title">عنوان </label>
                                <input type="text" name="title" value="{{$coupon->title}}" class="form-control"
                                       placeholder="عنوان تخفیف را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="code">کد تخفیف</label>
                                <input type="text" name="code" value="{{$coupon->code}}" class="form-control"
                                       placeholder="کد تخفیف را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="price">مبلغ تخفیف</label>
                                <input type="text" name="price" value="{{$coupon->price}}" class="form-control"
                                       placeholder="مبلغ تخفیف را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <div>
                                    @if($coupon->status==1)
                                    <input type="radio" name="status" value="0" ><span >منتشر نشده</span>
                                    <input type="radio" name="status" value="1" style="margin:0px 20px 0px 0px" checked><span>منتشر شده</span>
                                        @else
                                        <input type="radio" name="status" value="0" checked><span >منتشر نشده</span>
                                        <input type="radio" name="status" value="1" style="margin:0px 20px 0px 0px"><span>منتشر شده</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-left">ویرایش</button>

                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
