<form id="comment_form" method="POST" action="{{ action('CommentsController@save', ['article_id' => $article->id]) }}">
    <input type="text" name="author" placeholder="Name *"/>
    <input type="text" name="email" placeholder="E-mail *"/>
    <textarea name="content" rows="5" placeholder="Comment *"></textarea>
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <input id="comment_btn" type="submit" value="Отправить"/>
</form>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('message'))
{{ Session::get('message') }}
@endif