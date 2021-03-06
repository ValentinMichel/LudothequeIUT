<html>
<head>
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Ludothèque - @yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/mdb.lite.css')}}" rel="stylesheet">
    <link href="{{asset('css/mdb.lite.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/mdb.css')}}" rel="stylesheet">
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/addons/jquery.zmd.hierarchical-display.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/addons/flag.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/addons/directives.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/addons/rating.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/modules/animations-extended.min.css')}}" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        td>a{
            color: teal !important;
            font-weight: bold;
        }
    </style>
</head>
<body>
@section('header')
    @include('layout.navbar')
@show
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $message }}
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $message }}
    </div>
@endif
@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $message }}
    </div>
@endif
@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $message }}
    </div>
@endif

<div class="container" style="margin-bottom: 5%">
    @yield('content')
</div>
@section('footer')
    @include('layout.footer')
@show

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mdb.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/jquery.zmd.hierarchical-display.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/directives.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/flag.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/imagesloaded.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addons/masonry.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modules/animations-extended.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modules/forms-free.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modules/scrolling-navbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modules/treeview.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/modules/wow.min.js') }}"></script>
</body>
</html>