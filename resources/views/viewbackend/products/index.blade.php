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
                <h3 class="p-b-3 ">لیست محصولات</h3>
                <a class="btn btn-app pull-left" href="{{route('products.create')}}"><i
                            class="fa fa-plus-circle"></i>جدید</a>
            </div>
            <div class="box-body">
                @if(Session::has('delete_product'))
                    <div class="alert alert-danger">
                        {{session('delete_product')}}
                    </div>
                @endif
                @if(Session::has('update_product'))
                    <div class="alert alert-success">
                        {{"برند"."(".session('update_product').")"." ویرایش شد  "}}
                    </div>
                @endif
                @if(Session::has('create_product'))
                    <div class="alert alert-success">
                        {{session('create_product')}}
                    </div>
                @endif

                <table class="table table-hover bg-content ">
                    <thead>
                    <tr>
                        <th></th>
                        <th scope="col">شناسه</th>
                        <th class="text-center" scope="col">کد محصول</th>
                        <th class="text-center" scope="col">نام محصول</th>
                        <th class="text-center" scope="col">عملیات</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$product->id}}</td>

                            <td class="text-center">{{$product->sku}}</td>
                            <td class="text-center">{{$product->title}}</td>
                            {{--<td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference()}}</td>--}}
                            <td>
                                <div class="text-center">
                                <div class="col-md-6">
                                    <a class="btn btn-warning" href="{{route('products.edit',$product->id)}}">ویرایش</a>
                                </div>
                                    <div class="col-md-6">
                                    <form method="post" action="/main/products/{{$product->id}}">
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

                <div class="col-md-12 offset-md-5">{{$products->links()}}</div>
            </div>
        </div>

    </section>

@endsection