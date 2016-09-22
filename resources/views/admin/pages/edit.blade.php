@extends('layouts.app')

@section('content')
    <h2>Edit page</h2>
    <hr>
    <form method="POST" action="{{ action('PagesController@update', ['pages' => $page->id]) }}" enctype="multipart/form-data">
        <div class="form-group">
            <label>Icon</label>
            @if(!empty($page->icon))
                <img class="img-responsive img-rounded" src="{{ $page->icon }}"><br>
            @endif
            <input type="file" name="icon">
        </div>
        <div class="form-group">
            <label>Page name</label>
            <input type="text" name="title" class="form-control" placeholder="Name" value="{{ $page->title }}">
        </div>
        <div class="form-group">
            <label>Page content</label>
            <textarea name="content" id="editor_test" class="form-control" rows="10" placeholder="Content">{{ $page->content }}</textarea>
        </div>
        <div class="form-group">
            <label>Include category</label>
            <select name="include_category" class="form-control">
                @if($page->include_category == 0)
                    <option value="0" selected>No</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                @else
                    <option value="0">No</option>
                    @foreach($categories as $category)
                        @if($page->include_category == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Published</label>
            <select name="public" class="form-control">
                @if($page->public == 0)
                    <option value="0" disabled selected>No</option>
                @else
                    <option value="1" disabled selected>Yes</option>
                @endif
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Front page</label>
            <select name="front_page" class="form-control">
                @if($page->front_page == 0)
                    <option value="0" disabled selected>No</option>
                @else
                    <option value="1" disabled selected>Yes</option>
                @endif
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Show in menu</label>
            <select name="show_in_menu" class="form-control">
                @if($page->show_in_menu == 0)
                    <option value="0" disabled selected>No</option>
                @else
                    <option value="1" disabled selected>Yes</option>
                @endif
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="form-group">
            <label>Sort order</label>
            <input type="text" name="sort_order" class="form-control" placeholder="Sort order" value="{{ $page->sort_order }}">
        </div>
        <div class="form-group">
            <label>In development</label>
            <select name="in_dev" class="form-control">
                @if($page->in_dev == 0)
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
            <input type="text" name="meta_description" class="form-control" placeholder="Description" value="{{ $page->meta_description }}">
        </div>
        <div class="form-group">
            <label>Meta keywords</label>
            <input type="text" name="meta_keywords" class="form-control" placeholder="Keywords" value="{{ $page->meta_keywords }}">
        </div>
        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    <br>
    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif
    <br>
@endsection