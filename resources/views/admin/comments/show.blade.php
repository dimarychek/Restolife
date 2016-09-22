@extends('layouts.app')

@section('content')
    <h2>Comments</h2>

    <table class="table table-hover table-condensed">
        <tr class="info">
            <td><b>Post</b></td>
            <td><b>Author</b></td>
            <td><b>E-mail</b></td>
            <td><b>Comment</b></td>
            <td><b>Date</b></td>
            <td><b>Status</b></td>
            <td><b>Action</b></td>
            <td><b>Action</b></td>
        </tr>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->article->title }}</td>
                <td>{{ $comment->author }}</td>
                <td>{{ $comment->email }}</td>
                <td style="width: 40%;">{{ $comment->content }}</td>
                <td>{{ $comment->created_at }}</td>
                <td>{{ $comment->public }}</td>
                @if(Auth::user()->can('create'))
                    @if($comment->public == 1)
                        <td><a href="{{ action('CommentsController@published', ['id' => $comment->id]) }}" class="btn btn-success disabled" disabled="disabled">Public</a></td>
                    @else
                        <td><a href="{{ action('CommentsController@published', ['id' => $comment->id]) }}" class="btn btn-success">Public</a></td>
                    @endif
                    <td><a href="{{ action('CommentsController@delete', ['id' => $comment->id]) }}" class="btn btn-danger">Delete</a></td>
                @else
                    <td><a href="{{ action('CommentsController@published', ['id' => $comment->id]) }}" class="btn btn-success disabled" disabled="disabled">Public</a></td>
                    <td><a href="{{ action('CommentsController@delete', ['id' => $comment->id]) }}" class="btn btn-danger disabled" disabled="disabled">Delete</a></td>
                @endif
            </tr>
        @endforeach
    </table>

    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif
@endsection