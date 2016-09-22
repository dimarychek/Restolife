@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <h2>Pages</h2>
            <ul class="list-unstyled">
                <li><a href="/adminzone/pages"><i class="fa fa-file-text" aria-hidden="true"></i> All pages</a></li>
                @can('create')
                <li><a href="/adminzone/pages/create"><i class="fa fa-plus" aria-hidden="true"></i> Add pages</a></li>
                @endcan
            </ul>
        </div>
        <div class="col-md-3 col-sm-6">
            <h2>Categories</h2>
            <ul class="list-unstyled">
                <li><a href="/adminzone/categories"><i class="fa fa-file" aria-hidden="true"></i> All categories</a></li>
                @can('create')
                <li><a href="/adminzone/categories/create"><i class="fa fa-plus" aria-hidden="true"></i> Add category</a></li>
                @endcan
            </ul>
        </div>
        <div class="col-md-3 col-sm-6">
            <h2>Posts</h2>
            <ul class="list-unstyled">
                <li><a href="/adminzone/articles"><i class="fa fa-file-text-o" aria-hidden="true"></i> All posts</a></li>
                @can('create')
                <li><a href="/adminzone/articles/create"><i class="fa fa-plus" aria-hidden="true"></i> Add post</a></li>
                @endcan
            </ul>
        </div>
        <div class="col-md-3 col-sm-6">
            <h2>Comments</h2>
            <ul class="list-unstyled">
                <li><a href="/adminzone/comments"><i class="fa fa-comments" aria-hidden="true"></i> All comments</a></li>
            </ul>
        </div>
    </div>
@endsection