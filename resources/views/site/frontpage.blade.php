@extends('site.index')

@section('content')
<div class="front_page_content">
    @foreach($frontPage as $frontContent)
        <div class="text-center front_title">{{ $frontContent->title }}</div>
        <div class="text-center front_content">{!! $frontContent->content !!}</div>
    @endforeach
</div>

<div class="front_posts restaurants">
    <div class="text-center front_title">Restaurants</div>
    @foreach($restaurants as $restaurant)
        <div class="front_item">
            <a href="{{ action('FrontController@show', ['id' => $restaurant->id]) }}">
                <img src="{{ $restaurant->preview }}">
                <div class="post_title">{{ $restaurant->title }}</div>
                <div class="post_content">{!! str_limit($restaurant->content, 50) !!}</div>
            </a>
        </div>
    @endforeach
</div>

<div class="front_posts articles">
@foreach($articles as $article)
    <div class="front_item">
        <a href="{{ action('FrontController@show', ['id' => $article->id]) }}">
            <img src="{{ $article->preview }}">
            <div class="post_title">{{ $article->title }}</div>
            <div class="post_content">{!! str_limit($article->content, 50) !!}</div>
        </a>
    </div>
@endforeach
</div>
@endsection