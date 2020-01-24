@extends('viewbackend.layouts.master')'
@section('styles')

@endsection
@section('main-content')
    <div class="content">
        <div class="box box-info">
            <div class="box-header with-border">

                <h3 class="p-b-3  text-center">ایجاد کد تخفیف جدید</h3>
                @include('viewbackend.partials.form-errors')
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <form method="post" action="/main/coupons">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان </label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="عنوان تخفیف را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="code">کد تخفیف</label>
                                <input type="text" name="code" class="form-control"
                                       placeholder="کد تخفیف را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="code">مبلغ تخفیف</label>
                                <input type="text" name="price" class="form-control"
                                       placeholder="مبلغ تخفیف را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <div>
                                <input type="radio" name="status" value="0" checked><span >منتشر نشده</span>
                                <input type="radio" name="status" value="1" style="margin:0px 20px 0px 0px"><span>منتشر شده</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-left">ذخیره</button>

                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection
