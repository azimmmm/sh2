@extends('viewbackend.layouts.master')

@section('main-content')





    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">


                @if(\Illuminate\Support\Facades\Session::has('add_brand'))
                    <div class="alert alert-success">
                        {{session('add_brand')}}
                    </div>
                @endif
                <h3 class="p-b-3 ">لیست برندها</h3>
                <a class="btn btn-app pull-left" href="{{route('brands.create')}}"><i
                            class="fa fa-plus-circle"></i>جدید</a>
            </div>
            <div class="box-body">
                @if(Session::has('delete_brand'))
                    <div class="alert alert-danger">
                        {{session('delete_brand')}}
                    </div>
                @endif
                @if(Session::has('update_brand'))
                    <div class="alert alert-success">
                        {{"برند"."(".session('update_brand').")"." ویرایش شد  "}}
                    </div>
                @endif
                @if(Session::has('create_brand'))
                    <div class="alert alert-success">
                        {{session('create_brand')}}
                    </div>
                @endif

                <table class="table table-hover bg-content ">
                    <thead>
                    <tr>
                        <th></th>
                        <th scope="col">شناسه</th>
                        <th class="text-center" scope="col">نام برند</th>
                        <th class="text-center" scope="col">توضیحات</th>
                        <th class="text-center" scope="col">عملیات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$brand->id}}</td>

                            <td class="text-center">{{$brand->title}}</td>
                            <td class="text-center">{{$brand->desc}}</td>
                            {{--<td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference()}}</td>--}}
                            <td>
                                <div class="text-center">
                                <div class="col-md-6">
                                    <a class="btn btn-warning" href="{{route('brands.edit',$brand->id)}}">ویرایش</a>
                                </div>
                                    <div class="col-md-6">
                                    <form method="post" action="/main/brands/{{$brand->id}}">
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

                <div class="col-md-12 offset-md-5">{{$brands->links()}}</div>
            </div>
        </div>

    </section>

@endsection