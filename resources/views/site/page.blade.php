@extends('site.index')

@section('content')
    <div class="breadcrumb">
        <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Main</a> / <span class="this">{{ $pages->title }}</span>
    </div>
    <h1 class="postin_title">{{ $pages->title }}</h1>
    <br>
    <div class="postin_content">
        {!! $pages->content !!}
    </div>
    <div class="front_posts restaurants">
        @foreach($posts as $post)
            <div class="front_item">
                <a href="{{ action('FrontController@show', ['id' => $post->id]) }}">
                    <img src="{{ $post->preview }}">
                    <div class="post_title">{{ $post->title }}</div>
                    <div class="post_content">{!! str_limit($post->content, 50) !!}</div>
                </a>
            </div>
        @endforeach
    </div>
    <br>
    @if($pages->comments_enable == 1)
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
                @include('site.comment')
            </div>
        </div>
    @endif
@endsection