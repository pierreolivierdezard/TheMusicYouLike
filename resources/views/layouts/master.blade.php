<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf8>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{secure_asset('css/style.css')}}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="header">
            <a href="/post">
                <div class="title">The Music You Like</div>
            </a>
            <div class="menu">
                <a href="{{url("/ER")}}"><span>ER Diagram</span></a>
                <a href="{{url("/documentation")}}"><span>Documentation & details</span></a>
            </div>
        </div>
        <div class="container">
            <div class = "row">
                @yield('content')
            </div>
        </div>
    </body>
</html>