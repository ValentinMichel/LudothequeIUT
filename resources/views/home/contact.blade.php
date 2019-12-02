@extends("layout.master")
@section("title", "Contact")
@section("content")
<!-- Styles -->
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    .formulaire{
        margin-top: 2%;
        margin-bottom: 2%;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }
    .formulaire>form{
        border: 1px solid rgba(0, 0, 0, 0.2) !important;
        border-radius: 5px !important;
        background-color: whitesmoke;
        padding: 3%;
    }
    .content {
        text-align: center;
    }

    .title {
        font-size: 50px;
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
</style>

<div style="margin-top: 5vh;">

    <div class="content">
        <div class="title" style="color: rgba(0, 200, 180, 1); text-transform: uppercase;">
            Contact
        </div>
        <div style="font-size: 16px; text-align: justify; width: 100%;">
            <span style="text-transform: uppercase; font-weight: bold;">Propriétaire application : IUT de Lens</span><br/>
            <span style="text-transform: uppercase; font-weight: bold;">PHONE - </span> 555-044-3323<br/>
            <span style="text-transform: uppercase; font-weight: bold;">MAIL - </span> ludotheque@iut.univ-artois.fr<br/>
        </div>
    </div>
    <hr style="width: 100%;">
    <div class="formulaire">
        <form action="" method="POST">
            {!! csrf_field() !!}
            <div class="text-center">
                <h3>Nous contacter</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="name"><strong>Prénom & nom</strong></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" style="text-align: center; font-weight: bold;">
                </div>
                <div class="form-group col-md-4">
                    <label for="email"><strong>Email</strong></label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" style="text-align: center; font-weight: bold;">
                </div>
                <div class="form-group col-md-4">
                    <label for="objet"><strong>Objet</strong></label>
                    <input type="text" class="form-control" name="objet" id="objet" value="{{ old('objet') }}" style="text-align: center; font-weight: bold;">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="textarea-input"><strong>Contenu du message</strong></label>
                    <textarea name="content" id="content" rows="4" class="form-control"
                              placeholder="Ecrivez votre message..." style="font-weight: bold;">{{ old('content') }}</textarea>
                </div>
            </div>
            <div class="row" style="display: block;">
                <button class="btn btn-success col-md-2" type="submit" style="margin-left: 33%;">Envoyer le message</button>
                <a href="/"  style="margin-right: 33%;">
                    <input class="btn btn-danger" type="button" value="Retour sur interface">
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
