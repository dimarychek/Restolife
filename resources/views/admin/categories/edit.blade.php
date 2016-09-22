@extends('layouts.app')

@section('content')
    <h2>Edit category</h2>
    <hr>
    <form method="POST" action="{{ action('CategoriesController@update', ['categories' => $category->id])}}">
        <div class="form-group">
            <label>Category name</label>
            <input type="text" name="title" class="form-control" placeholder="Name" value="{{ $category->title }}">
        </div>
        <div class="form-group">
            <label>Show on front page</label>
            <select name="show_on_front" class="form-control">
                @if($category->show_on_front == 0)
                    <option value="0" disabled selected>No</option>
                @else
                    <option value="1" disabled selected>Yes</option>
                @endif
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <input type="hidden" name="_method" value="put"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    <br>
    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif
@endsection