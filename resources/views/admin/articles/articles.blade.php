@extends('layouts.app')

@section('content')
    <h2>Posts</h2>

    <table class="table table-hover table-condensed">
        <tr class="info">
            <td><b>ID</b></td>
            <td><b>Preview</b></td>
            <td><b>Name</b></td>
            <td><b>Action</b></td>
            <td><b>Action</b></td>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td><img class="img-responsive img-rounded" width="45" height="45" src="{{ $article->preview }}"></td>
                <td>{{ $article->title }}</td>
                @if(Auth::user()->can('create'))
                    <td><a href="{{ action('ArticlesController@edit', ['articles' => $article->id]) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ action('ArticlesController@destroy', ['articles' => $article->id]) }}">
                            <input type="hidden" name="_method" value="delete"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </td>
                @else
                    <td><a href="{{ action('ArticlesController@edit', ['articles' => $article->id]) }}" class="btn btn-primary disabled" disabled="disabled">Edit</a></td>
                    <td>
                        <form method="POST" action="{{ action('ArticlesController@destroy', ['articles' => $article->id]) }}">
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