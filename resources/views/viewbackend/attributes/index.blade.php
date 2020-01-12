@extends('viewbackend.layouts.master')

@section('main-content')

    @if(\Illuminate\Support\Facades\Session::has('add_attributesGroup'))
        <div class="alert alert-success">
            {{session('add_attributesGroup')}}
        </div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('update_attributesGroup'))
        <div class="alert alert-success">
            {{'دسته شماره'.session('update_attributesGroup').'ویرایش شد.'}}
        </div>
    @endif

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="p-b-3 ">لیست ویژگی ها</h3>
                <a class="btn btn-app pull-left" href="{{route('attributes-group.create')}}"><i
                            class="fa fa-plus-circle"></i>جدید</a>
            </div>
            <div class="box-body">
                @if(Session::has('delete_attribute'))
                    <div class="alert alert-warning">
                        {{session('delete_attribute')}}
                    </div>
                @endif
                @if(Session::has('update_attribute'))
                    <div class="alert alert-success">
                        {{session('update_attribute')}}
                    </div>
                @endif
                @if(Session::has('create_attribute'))
                    <div class="alert alert-success">
                        {{session('create_attribute')}}
                    </div>
                @endif

                <table class="table table-hover bg-content ">
                    <thead>
                    <tr>
                        <th></th>
                        <th scope="col">شناسه</th>
                        <th class="text-center" scope="col">عنوان ویژگی</th>
                        <th class="text-center" scope="col">نوع</th>
                        <th class="text-center" scope="col">عملیات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attributesGroup as $attribute)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$attribute->id}}</td>

                            <td class="text-center">{{$attribute->title}}</td>
                            <td class="text-center">{{$attribute->type}}</td>
                            {{--<td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference()}}</td>--}}
                            <td>
                                <div class="text-center">
                                <div class="col-md-6">
                                    <a class="btn btn-warning" href="{{route('attributes-group.edit',$attribute->id)}}">ویرایش</a>
                                </div>
                                    <div class="col-md-6">
                                    <form method="post" action="/main/attributes-group/{{$attribute->id}}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>

                <div class="col-md-12 offset-md-5">{{$attributesGroup->links()}}</div>
            </div>
        </div>

    </section>

@endsection