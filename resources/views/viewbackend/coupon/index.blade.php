@extends('viewbackend.layouts.master')

@section('main-content')





    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">


                @if(\Illuminate\Support\Facades\Session::has('add_coupon'))
                    <div class="alert alert-success">
                        {{session('add_coupon')}}
                    </div>
                @endif
                <h3 class="p-b-3 ">لیست تخفیف ها</h3>
                <a class="btn btn-app pull-left" href="{{route('coupons.create')}}"><i
                            class="fa fa-plus-circle"></i>جدید</a>
            </div>
            <div class="box-body">
                @if(Session::has('delete_coupon'))
                    <div class="alert alert-danger">
                        {{session('delete_coupon')}}
                    </div>
                @endif

                @if(Session::has('update_coupon'))
                    <div class="alert alert-success">
                        {{session('update_coupon')}}
                    </div>
                @endif

                @if(Session::has('create_coupon'))
                    <div class="alert alert-success">
                        {{session('create_coupon')}}
                    </div>
                @endif

                <table class="table table-hover bg-content ">
                    <thead>
                    <tr>
                        <th></th>
                        <th scope="col">شناسه تخفیف</th>
                        <th class="text-center" scope="col">عنوان</th>
                        <th class="text-center" scope="col">وضعیت</th>
                        <th class="text-center" scope="col">میزان تخفیف</th>
                        <th class="text-center" scope="col">عملیات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coupons as $coupon)
                        <tr>
                            <th scope="row"></th>
÷                               <td>{{$coupon->code}}</td>

                            <td class="text-center">{{$coupon->title}}</td>
                            @if($coupon->status==1)
                            <td class="text-center"><span class="text-success">فعال</span></td>
                            @else
                            <td class="text-center "><span class="text-danger">غیر فعال</span></td>
                            @endif
                            <td class="text-center">{{$coupon->price}}</td>
                            {{--<td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference()}}</td>--}}
                            <td>
                                <div class="text-center">
                                    <div class="col-md-6">
                                        <a class="btn btn-warning" href="{{route('coupons.edit',$coupon->id)}}">ویرایش</a>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post" action="/main/coupons/{{$coupon->id}}">
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

                <div class="col-md-12 offset-md-5">{{$coupons->links()}}</div>
            </div>
        </div>

    </section>

@endsection