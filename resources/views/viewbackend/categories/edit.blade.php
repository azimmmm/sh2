@extends('viewbackend.layouts.master')'
@section('main-content')
<div class="content">
    <div class="box box-info">
        <div class="box-header with-border">

                <h3 class="p-b-3  text-center">ایجاد دسته بندی جدید</h3>
                @include('viewbackend.partials.form-errors')
        </div>
<div class="box-body">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form method="post" action="/main/categories/{{$category->id}}">

                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label for="title">عنوان دسته</label>
                    <input type="text" name="title" class="form-control" value="{{$category->name}}" placeholder="">
                </div>
                <div class="form-group">
                    <label >والد</label>
                    <select name="category_parent" id="" class="form-control" >

                        <option value="">بدون والد</option>
                        @foreach($categories as $category_data)


                            <option value="{{$category_data->id}}" @if($category_data->id==$category->parent_id) selected @endif>{{$category_data->name}}</option>

                            @if(count($category_data->childRecursive)>0)

                                @include('viewbackend.partials.category',['categories'=>$category_data->childRecursive,'category_selected'=>$category,'level'=>1]);

                            @endif
                        @endforeach
                    </select>
                </div>
                {{--<div class="form-group">--}}
                {{--{!! Form::label('slug','نام مستعار:') !!}--}}
                {{--{!! Form::text('slug',null,['class'=>'form-control']) !!}--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="meta_title">عنوان سئو</label>
                    <textarea name="meta_title" class="form-control">{{$category->meta_title}}
                        </textarea>
                </div>

                <div class="form-group">
                    <label for="meta_desc">توضیحات</label>
                    <textarea name="meta_desc" class="form-control">{{$category->meta_desc}}
                    </textarea>
                </div>

                {{--{!! Form::label('meta_description','متا توضیحات:') !!}--}}
                {{--{!! Form::textarea('meta_description',null,['class'=>'form-control']) !!}--}}

                <div class="form-group">
                    <label for="meta_keywords">برچسب ها</label>
                    <textarea name="meta_keywords" class="form-control" >{{$category->meta_keywords}}
                          </textarea>
                </div>
                {{--<div class="form-group">--}}
                {{--{!! Form::label('meta_keywords','متابرچسبها:') !!}--}}
                {{--{!! Form::textarea('meta_keywords',null,['class'=>'form-control']) !!}--}}
                {{--</div>--}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-left">ویرایش</button>
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