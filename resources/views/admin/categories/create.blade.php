@extends('layouts.app')

@section('content')
    <h2>New category</h2>
    <hr>
    <form method="POST" action="{{ action('CategoriesController@store') }}">
        <div class="form-group">
            <label>Category name</label>
            <input type="text" name="title" class="form-control" placeholder="Name">
        </div>
        <div class="form-group">
            <label>Show on front page</label>
            <select name="show_on_front" class="form-control">
                <option value="1">Yes</option>
                <option value="0" selected>No</option>
            </select>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
    <br>
    @if(Session::has('message'))
    {{ Session::get('message') }}
    @endif
@endsection