@extends('viewbackend.layouts.master')'
@section('main-content')
<div class="content">
    <div class="box box-info">
        <div class="box-header with-border">

                <h3 class="p-b-3  text-center">ایجاد ویژگی جدید</h3>
                @include('viewbackend.partials.form-errors')
        </div>
<div class="box-body">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="post" action="/main/attributes-group">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان ویژگی </label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان ویژگی را وارد کنید ....">
                </div>
                <div class="form-group">

                    <label >نوع</label>
                    <select name="type" id="" class="form-control" >

                        <option value="select">لیست تکی</option>
                        <option value="multiple">لیست چندتایی</option>

                    </select>
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