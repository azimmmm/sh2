

@extends('viewbackend.layouts.master')


@section('main-content')

    @if(Session::has('add_category'))
        <div class="alert alert-success">
            {{session('add_category')}}
        </div>
    @endif
    @if(Session::has('update_category'))
        <div class="alert alert-success">
            {{'دسته شماره'.session('update_category').'ویرایش شد.'}}
        </div>
    @endif

<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="p-b-3 ">لیست دسته بندی ها</h3>
            <a class="btn btn-app pull-left" href="{{route('categories.create')}}"><i class="fa fa-plus-circle"></i>جدید</a>
        </div>
<div class="box-body">
    @if(Session::has('fail_delete_category'))
        <div class="alert alert-warning">
            {{session('fail_delete_category')}}
        </div>
    @endif
    @if(Session::has('delete_category'))
        <div class="alert alert-danger">
            {{session('delete_category')}}
        </div>
    @endif
    <table class="table table-hover bg-content ">
        <thead>
        <tr>
            <th></th>
            <th scope="col">شناسه</th>
            <th scope="col">عنوان دسته</th>
            <th scope="col">تاریخ ایجاد</th>
            <th scope="col" class="text-center">عملیات</th>

        </tr>
        </thead>
        <tbody>


        @foreach($categories as $category)
            <tr>
                <th scope="row"></th>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>


<td></td>
                {{--<td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference()}}</td>--}}

<td >
    <div class="text-center">
    <div class="col-md-4">
    <a class="btn btn-warning" href="{{route('categories.edit',$category->id)}}">ویرایش</a>
    </div>
        <div class="col-md-4">
            <a class="btn btn-primary" href="{{route('categories.indexSetting',$category->id)}}">تنظیمات</a>
        </div>
    <div class="col-md-4">

    <form method="post" action="/main/categories/{{$category->id}}">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger">حذف</button>
    </form>
    </div>
    </div>
</td>
            </tr>
            @if(count($category->childRecursive)>0)
            @include('viewbackend.partials.category_list',['categories'=>$category->childRecursive,'level'=>1])

            @endif
        @endforeach

        </tbody>
    </table>
    <div class="col-md-12 offset-md-5">{{$categories->links()}}</div>
    </div>
    </div>
</section>

@endsection