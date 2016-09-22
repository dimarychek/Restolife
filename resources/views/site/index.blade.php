<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Restolife</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
    <script src="https://use.fontawesome.com/6a8042c294.js"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="text-center site_name"><a href="/">RestoLife</a></div>
        <div class="text-center site_sub">Look inside & outside</div>

        <div id="menu">
            <ul>
                @foreach($menu as $item)
                    @if($item->in_dev == 1)
                        <li class="in_dev">
                            <a href="/page/{{ $item->id }}"><img src="{{ $item->icon }}"><span>{{ $item->title }}</span></a>
                            <div class="indev_block">Section is under construction.</div>
                        </li>
                    @else
                        <li>
                            <a href="/page/{{ $item->id }}"><img src="{{ $item->icon }}"><span>{{ $item->title }}</span></a>
                            <div class="indev_block">Section is under construction.</div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</header>

<div class="@if(Request::url() == 'http://guestbook.idealab.com.ua') main_content @endif">
    <div class="container">
        @yield('content')
    </div>
</div>

<footer>
    <div class="container">
        <div class="text-center foot_name"><a href="/">RestoLife</a></div>
        <div class="text-center foot_sub">Look inside & outside</div>
        <div class="text-center foot_copy">2016 &copy; <a href="/">Restolife</a></div>
        <div class="text-center foot_dev">Developed by Dima Rychek</div>
    </div>
</footer>
</body>
</html>