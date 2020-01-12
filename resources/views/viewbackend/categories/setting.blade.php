@extends('viewbackend.layouts.master')'
@section('main-content')
<div class="content">
    <div class="box box-info">
        <div class="box-header with-border">

                <h3 class="p-b-3  text-center">تنظیم ویژگی برای {{$category->name}}</h3>
                @include('viewbackend.partials.form-errors')
        </div>
<div class="box-body">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="post" action="/main/categories/{{$category->id}}/saveSetting">
                @csrf
                <div class="form-group">
                    <label for="attributeGroups">ویژگی مربوط به دسته ی {{$category->name}}</label>
                        <select name="attributeGroups[]" id="" multiple class="form-control">
                            @foreach($attributeGroups as $attributeGroup)
                                <option value="{{$attributeGroup->id}}" @if(in_array($attributeGroup->id,$category->attributeGroups->pluck('id')->toArray()))selected @endif
                                    >{{$attributeGroup->title}}</option>
                                @endforeach
                        </select>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-left">ذخیره</button>
                </div>
                {{--<div class="form-group">--}}
                {{--{!! Form::submit('ذخیره',['class'=>'btn btn-primary']) !!}--}}
                {{--</div>--}}
            </form>

            {{--{!! Form::close() !!}--}}
    </div>
    </div>
        </div>
    </div>

</div>



@endsection