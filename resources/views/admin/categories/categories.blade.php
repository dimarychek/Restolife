@extends('layouts.app')

@section('content')
    <h2>Categories</h2>

    <table class="table table-hover table-condensed">
        <tr class="info">
            <td><b>ID</b></td>
            <td><b>Name</b></td>
            <td><b>Action</b></td>
            <td><b>Action</b></td>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>

                @if(Auth::user()->can('create'))
                    <td><a href="{{ action('CategoriesController@edit', ['categories' => $category->id]) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ action('CategoriesController@destroy', ['categories' => $category->id]) }}">
                            <input type="hidden" name="_method" value="delete"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </td>
                @else
                    <td><a href="{{ action('CategoriesController@edit', ['categories' => $category->id]) }}" class="btn btn-primary disabled" disabled="disabled">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ action('CategoriesController@destroy', ['categories' => $category->id]) }}">
                            <input type="hidden" name="_method" value="delete"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="submit" class="btn btn-danger" disabled="disabled" value="Delete"/>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>

    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif
@endsection