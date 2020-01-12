@foreach($categories as $sub_category)

    <tr>
        <th scope="row"></th>
        <td>{{$sub_category->id}}</td>
        <td><a href="{{route('categories.edit',$sub_category->id)}}">{{str_repeat('--',$level)}}{{$sub_category->name}}</a></td>


        <td></td>
        {{--<td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference()}}</td>--}}

        <td>
            <div class="text-center">
                <div class="col-md-4">
            <a class="btn btn-warning " href="{{route('categories.edit',$sub_category->id)}}">ویرایش</a>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-primary" href="{{route('categories.indexSetting',$sub_category->id)}}">تنظیمات</a>
                </div>
                <form method="post" action="/main/categories/{{$sub_category->id}}">
                    @csrf
                    <div class="text-center">
                        <div class="col-md-4">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger ">حذف</button>
                        </div>
                    </div>
                </form>
            </div>
        </td>
    </tr>

    @if(count($sub_category->childRecursive)>0)

        @include('viewbackend.partials.category_list',['categories'=>$sub_category->childRecursive,'level'=>$level+5])
    @endif
@endforeach