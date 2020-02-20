@extends('viewbackend.layouts.master')'
@section('styles')
    <link rel="stylesheet" href="{{asset('admincssjs/dist/css/dropzone.min.css')}}">
@endsection
@section('main-content')
    <div class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">

                <h3 class="p-b-3  text-center">ایجاد محصول جدید</h3>
                @include('viewbackend.partials.form-errors')
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <form id="myForm" method="post" action="/main/products">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان محصول</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="عنوان محصول را وارد کنید ....">
                            </div>

                            <attribute-component :brands="{{ $brands }}"></attribute-component>
                                        <div class='form-group'>
                                <label for="status">وضعیت نشر</label>
                                <div>
                                    <input type="radio" name="status" value="0" checked><span>منتشر شده</span>
                                    <input type="radio" name="status" value="1" style="margin-right: 10px"><span>منتشر نشده</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار</label>
                                <input type="text" name="slug" class="form-control"
                                       placeholder="نام مستعار محصول را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="price">قیمت</label>
                                <input type="number" name="price" class="form-control"
                                       placeholder="قیمت محصول را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">قیمت ویژه</label>
                                <input type="number" name="discount_price" class="form-control"
                                       placeholder="قیمت ویژه محصول را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <lable for="photo_id">تصویر</lable>
                                <div class="dropzone dz-clickable" id="photo">
                                    <div class="dz-default dz-message" data-dz-message="">
                                        <input type="hidden" id="product-photo" name="photo_id">
                                        <span>فایل خود را آپلود کنید</span>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="desc">توضیحات مختصر</label>
                                <textarea name="short_desc" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="desc">توضیحات کلی</label>
                                <textarea name="long_desc" class="form-control"></textarea>
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
@section('scripts')
    <script src="{{asset('admincssjs/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('admincssjs/dist/js/dropzone.min.js')}}"></script>
<script>
// fix this “Dropzone already attached” error with Dropzone.autoDiscover=false
Dropzone.autoDiscover = false;
var drop = new Dropzone("div#photo", {
addRemoveLinks: true,
maxFiles: 1,
url: "{{route('photos.upload')}}",
sending: function (file, xhr, formData) {
formData.append("_token", "{{csrf_token()}}")
},
success: function (file, response) {
document.getElementById('product-photo').value = response.photo_id

}
});
</script>
@endsection