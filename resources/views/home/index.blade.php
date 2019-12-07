@section('content')
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 70vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md" style="color: rgba(0, 200, 180, 1);">
            Ludothèque IUT
        </div>

        <div class="links">
            <a href="{{route('jeux.index')}}">Liste des jeux</a>
            <a href="{{route('comments.index')}}">Liste des commentaires</a>
            <a href="{{route('tags.index')}}">Liste des tags</a>
            <a href="{{route('home.about')}}">About</a>
            <a href="{{route('home.contact')}}">Contact us</a>
        </div>
        <div style="margin-top: 2%; font-size: 20px;">
            Site de l'application Ludothèque de l'IUT de Lens.
        </div>
    </div>
</div>
@endsection