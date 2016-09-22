@extends('site.index')

@section('content')
    <div class="breadcrumb">
        <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Main</a> / <span class="this">{{ $article->title }}</span>
    </div>
    <h1 class="postin_title">{{ $article->title }}</h1>
    <br>
    <div class="postin_content">
        {!! $article->content !!}
    </div>
    <br>
    <br>
    </div>
    <div class="post_img">
        <div class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i> &nbsp; {{ $article->updated_at }}</div>
        <img class="img-responsive portrait" src="{{ $article->preview }}">
    </div>
    <div class="container">
    <br>
    <div class="comments">
        <div class="comments_list">
            @if(isset($comments[0]))
                @foreach($comments as $comment)
                    <div class="one_comment">
                        <div class="author"><i class="fa fa-user" aria-hidden="true"></i> {{ $comment->author }}</div>
                        <div class="comment_text">{{ $comment->content }}</div>
                    </div>
                @endforeach
            @else
                <div class="no_comments"><i class="fa fa-comments" aria-hidden="true"></i> No comments yet.</div>
            @endif
        </div>
        <div class="comment_form">
            <h4><i class="fa fa-comment" aria-hidden="true"></i> Leave a comment</h4>
            @if($article->comments_enable == 1)
                @include('site.comment')
            @endif
        </div>
    </div>
@endsection