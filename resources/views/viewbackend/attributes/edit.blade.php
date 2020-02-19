@extends('viewbackend.layouts.master')'
@section('main-content')
<div class="content">
    <div class="col-md-6 col-md-offset-3">
        <form method="post" action="/main/attributes-group/{{$attribute->id}}">

            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" name="title" class="form-control" value="{{$attribute->title}}" placeholder="">
            </div>
            <div class="form-group">
                <label >والد</label>
                <select name="type" id="" class="form-control" >

                    <option value="select"
                   @if($attribute->type=='select' )
                    selected

                    @endif>لیست تکی</option>
                    <option value="multiple" @if($attribute->type=='multiple' )
                    selected

                    @endif>لیست چندتایی</option>


                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-left">ویرایش</button>
            </div>

        </form>

        {{--{!! Form::close() !!}--}}
    </div>

</div>



@endsection