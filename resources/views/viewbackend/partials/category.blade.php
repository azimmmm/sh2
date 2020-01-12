@if(isset($category_selected))
    @foreach($categories as $sub_category)
        <option value="{{$sub_category->id}}"
                @if($sub_category->id==$category_selected->parent_id) selected @endif >{{str_repeat('--',$level)}}{{$sub_category->name}}</option>
        @if(count($sub_category->childRecursive)>0)
            @include('viewbackend.partials.category',['categories'=>$sub_category->childRecursive,'level'=>$level+5,'category_selected'=>$category_selected]);
        @endif
    @endforeach
@else
    {{--قسمت مربوط به create--}}
    @foreach($categories as $sub_category)
    <option value="{{$sub_category->id}}">{{str_repeat('--',$level)}}{{$sub_category->name}}</option>
    @if(count($sub_category->childRecursive)>0)
        @include('viewbackend.partials.category',['categories'=>$sub_category->childRecursive,'level'=>$level+5]);
    @endif
@endforeach
@endif
