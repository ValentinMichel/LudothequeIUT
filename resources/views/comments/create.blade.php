@extends("layout.master")
@php
    $jeu = \Illuminate\Support\Facades\DB::table('jeux')->where('id', $_GET['id'])->get();
@endphp
@section("title", "{$jeu[0]->title}")
@section("content")
<style>
    .formulaire{
        margin-top: 2%;
        margin-bottom: 2%;
        margin-left: auto;
        margin-right: auto;
    }
    .formulaire>form{
        border: 1px solid rgba(0, 0, 0, 0.2) !important;
        border-radius: 5px !important;
        background-color: whitesmoke;
        padding: 3%;
    }
    a:hover{
        text-decoration: none;
    }
</style>

<div class="formulaire">
    <form action="{{route('comments.store')}}" method="POST" style="">
        {!! csrf_field() !!}
        <div class="text-center">
            <h3>Ajouter un commentaire sur {{$jeu[0]->title}}</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="row">
            <input type="hidden" name="id" id="id" value="{{$jeu[0]->id}}" required>
            <input type="hidden" name="auteur_id" id="auteur_id" value="{{Auth::user()->getAuthIdentifier()}}" required>
            <div class="form-group col-md-4">
                <label for="title"><strong>Titre du commentaire</strong></label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" style="text-align: center; font-weight: bold;">
            </div>
            <div class="form-group col-md-4">
                <label for="auteur"><strong>Auteur</strong></label>
                <input type="text" class="form-control" name="auteur" id="auteur" value="{{Auth::user()->name}}" style="text-align: center; font-weight: bold;" readonly>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="textarea-input"><strong>Commentaire</strong></label>
                <textarea name="commentaire" id="commentaire" rows="4" class="form-control"
                          placeholder="Description..." style="font-weight: bold;">{{ old('commentaire') }}</textarea>
            </div>
        </div>
        <div class="row" style="display: block; margin: auto; text-align: center;">
            <button class="btn btn-success" type="submit" style="display: inline; color: whitesmoke; text-decoration: none;">
                Valider la création
            </button>
            <a href="/comments/{{$jeu[0]->id}}">
                <button class="btn btn-danger" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
                    Annuler la création
                </button>
            </a>
        </div>
    </form>
</div>
@if ($errors->any())
    <div style="border-radius: 2px; background-color: whitesmoke; color: rgba(0, 0, 0, 0.5); width: 40%; margin: auto; margin-bottom: 3%; border-radius: 8px; box-shadow: 1px 3px 7px rgba(0, 0, 0, 0.3);">
        <div style="color: rgba(255, 255, 255, 1); background-color: rgba(248, 43, 13, 0.7); width: 100%; font-size: 50px; height: 70px; text-align: center; border-top-right-radius: 8px; border-top-left-radius: 8px; ">
            <i class="fas fa-exclamation-triangle" style="padding: 8px;"></i>
        </div>
        <div style="padding: 2%;">
            <span style="text-align: center; color: rgba(248, 43, 13, 0.7); font-weight: bold;">Les erreurs suivantes doivent être corrigées...</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@endsection