@extends('viewbackend.layouts.master')'
@section('styles')
    <link rel="stylesheet" href="{{asset('admincssjs/dist/css/dropzone.min.css')}}">
@endsection
@section('main-content')
    <div class="content">
        <div class="box box-info">
            <div class="box-header with-border">

                <h3 class="p-b-3  text-center">ایجاد برند جدید</h3>
                @include('viewbackend.partials.form-errors')
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <form method="post" action="/main/brands">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان برند</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="عنوان برند را وارد کنید ....">
                            </div>
                            <div class="form-group">
                                <label for="desc">توضیحات</label>
                                <textarea name="desc" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <lable for="photo_id">تصویر</lable>
                                <div class="dropzone dz-clickable" id="photo">
                                    <div class="dz-default dz-message" data-dz-message="">
                                <input type="hidden" id="brand-photo" name="photo_id">
                                        <span>فایل خود را آپلود کنید</span>
                                    </div>
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
@section('scripts')
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
                document.getElementById('brand-photo').value = response.photo_id

            }
        });
    </script>
@endsection