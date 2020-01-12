@extends('viewbackend.layouts.master')'
@section('styles')
    <link rel="stylesheet" href="{{asset('admincssjs/dist/css/dropzone.min.css')}}">
@endsection
@section('main-content')
    <div class="content">
        <div class="box box-info">
            <div class="box-header with-border">

                <h3 class="p-b-3  text-center">ویرایش برند جدید</h3>
                @include('viewbackend.partials.form-errors')
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/main/brands/{{$brand->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group">
                                <label for="title">عکس برند</label>
                                <img
                                        {{--src="{{asset("storage/photos/$photo->path")}}"--}}
                                 src="{{$brand->photo->path}}">

                            </div>
                            <div class="form-group">
                                <label for="title">عنوان برند</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{$brand->title}}">
                            </div>
                            <div class="form-group">
                                <label for="desc">توضیحات</label>
                                <textarea name="desc" class="form-control">{{$brand->desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <lable for="photo">تصویر</lable>
                                <input type="hidden" id="brand-photo" name="photo_id" value="{{$brand->photo_id}}">

                                <div id="photo" class="dropzone"></div>

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
@section('scripts')
    <script type="text/javascript" src="{{asset('admincssjs/dist/js/dropzone.min.js')}}"></script>
    <script>
        Dropzone.autoDiscover=false;
        var drop = new Dropzone('#photo', {
            url: "{{route('photos.upload')}}",
            maxFiles:1,
            addRemoveLinks:true,
            sending:function (file,xhr,formData) {
                formData.append("_token","{{csrf_token()}}")
            },
            success:function (file,response) {
                document.getElementById('brand-photo').value=response.photo_id

            }
        });
    </script>
@endsection