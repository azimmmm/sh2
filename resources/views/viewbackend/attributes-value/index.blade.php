@extends('viewbackend.layouts.master')

@section('main-content')

    {{--@if(\Illuminate\Support\Facades\Session::has('add_attributesGroup'))--}}
        {{--<div class="alert alert-success">--}}
            {{--{{session('add_attributesGroup')}}--}}
        {{--</div>--}}
    {{--@endif--}}
    {{--@if(\Illuminate\Support\Facades\Session::has('update_attributesGroup'))--}}
        {{--<div class="alert alert-success">--}}
            {{--{{'دسته شماره'.session('update_attributesGroup').'ویرایش شد.'}}--}}
        {{--</div>--}}
    {{--@endif--}}

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="p-b-3 ">لیست مقادیر ویژگی ها</h3>
                <a class="btn btn-app pull-left" href="{{route('attributes-value.create')}}"><i
                            class="fa fa-plus-circle"></i>جدید</a>
            </div>
            <div class="box-body">
                @if(Session::has('delete_attributeValue'))
                    <div class="alert alert-warning">
                        {{session('delete_attributeValue')}}
                    </div>
                @endif
                @if(Session::has('update_attributeValue'))
                    <div class="alert alert-success">
                        {{session('update_attributeValue')}}
                    </div>
                @endif
                @if(Session::has('create_attributeValue'))
                    <div class="alert alert-success">
                        {{session('create_attributeValue')}}
                    </div>
                @endif

                <table class="table table-hover bg-content ">
                    <thead>
                    <tr>
                        <th></th>
                        <th scope="col">شناسه</th>
                        <th class="text-center" scope="col">مقدار ویژگی</th>
                        <th class="text-center" scope="col">ویژگی</th>
                        <th class="text-center" scope="col">عملیات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($attributeValue as $attribute)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$attribute->id}}</td>

                            <td class="text-center">{{$attribute->title}}</td>
                            <td class="text-center">

{{$attribute->attributeGroup->title}}



                            </td>
                            {{--<td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference()}}</td>--}}
                            <td>
                                <div class="text-center">
                                <div class="col-md-6">
                                    <a class="btn btn-warning" href="{{route('attributes-value.edit',$attribute->id)}}">ویرایش</a>
                                </div>
                                    <div class="col-md-6">
                                    <form method="post" action="/main/attributes-value/{{$attribute->id}}">
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

                <div class="col-md-12 offset-md-5">{{$attributeValue->links()}}</div>
            </div>
        </div>

    </section>

@endsection