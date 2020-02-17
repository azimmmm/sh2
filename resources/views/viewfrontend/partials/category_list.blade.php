<div class="dropdown-menu">

    <ul>
@foreach($categories as $sub_category)
            @if(count($sub_category->childRecursive)>0)
            <li><a href="{{route('category.index',$sub_category->id)}}">{{$sub_category->name}} <span>&rsaquo;</span></a>


                @include('viewfrontend.partials.category_list',['categories'=>$sub_category->childRecursive])
            </li>
                @else
                <li><a href="{{route('category.index',$sub_category->id)}}">{{$sub_category->name}}</a></li>

            @endif
        @endforeach
    </ul>

</div>