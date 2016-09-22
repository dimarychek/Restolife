@extends('layouts.app')

@section('content')
    <h2>New post</h2>
    <hr>
    <form method="POST" action="{{ action('ArticlesController@update', ['articles'=>$article->id]) }}" enctype="multipart/form-data">
        <div class="form-group">
            <label>Icon</label>
            @if(!empty($article->preview))
                <img class="img-responsive img-rounded" src="{{ $article->preview }}"><br>
            @endif
            <input type="file" name="preview">
        </div>
        <div class="form-group">
            <label>Post name</label>
            <input type="text" name="title" class="form-control" placeholder="Name" value="{{ $article->title }}">
        </div>
        <div class="form-group">
            <label>Post content</label>
            <textarea name="content" id="editor_test" class="form-control" rows="10" placeholder="Content">{{ $article->content }}</textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    @if($article->category_id == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Comments enable</label>
            <select name="comments_enable" class="form-control">
                @if($article->comments_enable == 0)
                    <option value="0" disabled selected>No</option>
                @else
                    <option value="1" disabled selected>Yes</option>
                @endif
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Published</label>
            <select name="public" class="form-control">
                @if($article->public == 0)
                    <option value="0" disabled selected>No</option>
                @else
                    <option value="1" disabled selected>Yes</option>
                @endif
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <h3>Meta</h3>
        </div>
        <div class="form-group">
            <label>Meta description</label>
            <input type="text" name="meta_description" class="form-control" placeholder="Description" value="{{ $article->meta_description }}">
        </div>
        <div class="form-group">
            <label>Meta keywords</label>
            <input type="text" name="meta_keywords" class="form-control" placeholder="Keywords" value="{{ $article->meta_keywords }}">
        </div>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    <br>
    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif
    <br>
@endsection
