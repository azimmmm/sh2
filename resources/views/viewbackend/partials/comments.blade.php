<script type="text/javascript">
    $(".btn-open").click(function () {
        $('.form-reply').css('display', 'none')
        var service = this.id
        var service_id = '#f-' + service
        $(service_id).show('slow');
    })
</script>

@foreach(($comments) as $comment)
    @if($comment->status==1)
    <div class="media mb-4 ml-4 ">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">مهمان</h5>
            {{$comment->description}}
            {{--<div class=" mt-2 mb-2 ">--}}
            {{--<div class="col-md-12 mb-2">--}}
            <button class="btn btn-warning btn-open" id="div-comment-{{$comment->id}}"> پاسخ</button>
            <div class="media mt-4">
                <div class="form-reply col-md-12" id="f-div-comment-{{$comment->id}}" style="display: none">
                    <a href="" id="reply"></a>
                    {!! Form::open(['method' => 'POST', 'route'=> ['frontend.comments.reply'],]) !!}

                    <div class="form-group">
                        {!! Form::hidden('parent_id', $comment->id) !!}
                        {!! Form::hidden('post_id', $post->id) !!}

                        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('ثبت پاسخ', ['class'=>'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>

            </div>
            @include('viewbackend.partials.comments', ['comments' =>$comment->replies])
{{--            {{dd($comment->replies)}}--}}

        </div>
    </div>
@endif
@endforeach