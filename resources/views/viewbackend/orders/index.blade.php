@extends('viewbackend.layouts.master')

@section('main-content')





    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">


                <h3 class="p-b-3 ">لیست سفاشات</h3>

            </div>
            <div class="box-body">


                <table class="table table-hover bg-content ">
                    <thead>
                    <tr>
                        <th></th>
                        <th scope="col">شناسه</th>
                        <th class="text-center" scope="col">مقدار</th>
                        <th class="text-center" scope="col">وضعیت</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$order->id}}</td>

                            <td class="text-center">{{$order->amount}}</td>

                            <td class="text-center">
                                @if($order->status==1)
                                    <span class="text-success">پرداخت شده</span>
                                @else
                                    <span class="text-danger">پرداخت نشده</span>

                                @endif
                            </td>
{{--<td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference()}}</td>--}}

                        </tr>

                    @endforeach


                    </tbody>
                </table>

                <div class="col-md-12 offset-md-5">{{$orders->links()}}</div>
            </div>
        </div>

    </section>

@endsection