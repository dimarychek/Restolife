@extends('layouts.app')

@section('content')
    <h2>Pages</h2>

    <table class="table table-hover table-condensed">
        <tr class="info">
            <td><b>ID</b></td>
            <td><b>Name</b></td>
            <td><b>Action</b></td>
            <td><b>Action</b></td>
        </tr>
        @foreach ($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{{ $page->title }}</td>
                @if(Auth::user()->can('create'))
                    <td><a href="{{ action('PagesController@edit', ['categories' => $page->id]) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ action('PagesController@destroy', ['categories' => $page->id]) }}">
                            <input type="hidden" name="_method" value="delete"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </td>
                @else
                    <td><a href="{{ action('PagesController@edit', ['categories' => $page->id]) }}" class="btn btn-primary disabled" disabled="disabled">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ action('PagesController@destroy', ['categories' => $page->id]) }}">
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