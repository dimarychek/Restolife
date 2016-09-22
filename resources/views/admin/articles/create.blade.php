@extends('layouts.app')

@section('content')
    <h2>New post</h2>
    <hr>
    <form method="POST" action="{{ action('ArticlesController@store') }}" enctype="multipart/form-data">
        <div class="form-group">
            <label>Icon</label>
            <input type="file" name="preview">
        </div>
        <div class="form-group">
            <label>Post name</label>
            <input type="text" name="title" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label>Post content</label>
            <textarea name="content" id="editor_test" class="form-control" rows="10" placeholder="Content"></textarea>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Comments enable</label>
            <select name="comments_enable" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Published</label>
            <select name="public" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <h3>Meta</h3>
        </div>
        <div class="form-group">
            <label>Meta description</label>
            <input type="text" name="meta_description" class="form-control" placeholder="Description">
        </div>
        <div class="form-group">
            <label>Meta keywords</label>
            <input type="text" name="meta_keywords" class="form-control" placeholder="Keywords">
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    <br>
    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif
    <br>
@endsection
