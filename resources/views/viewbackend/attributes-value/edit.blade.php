@extends('viewbackend.layouts.master')'
@section('main-content')
    <div class="content">
        <div class="col-md-6 col-md-offset-3">

            <form method="post" action="/main/attributes-value/{{$attribute->id}}">

                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" name="title" class="form-control" value="{{$attribute->title}}" placeholder="">
                </div>
                <div class="form-group">
                    <label>نوع ویژگی</label>
                    <select name="type" id="" class="form-control">
                        @foreach($attribute_group as $attribute_group1)
                            <option value="{{$attribute_group1->id}}"
                                    @if($attribute->attributeGroup_id==$attribute_group1->id)
                                    selected @endif>{{$attribute_group1->title}}</option>
                        @endforeach
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