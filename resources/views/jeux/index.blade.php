@extends('layout.master')
@section('title', 'Liste des jeux')
@section('content')
<style>
    a:hover{
        text-decoration: none;
    }
</style>
<h2 style="text-align: center; width: 100%; margin-top: 2%; text-transform: uppercase;">La liste des jeux</h2>
@if(!empty($jeux))
    <table class="table table-striped table-hover table-bordered table-responsive" style="margin-left: auto; margin-right: auto; width: 100%;">
        <thead class="">
        <tr>
            <td scope="col">#</td>
            <td scope="col" style="width: 200px;">Title</td>
            <td scope="col">Year</td>
            <td scope="col">Age</td>
            <td scope="col">Type</td>
            <td scope="col">Description</td>
            <td scope="col" style="width: 115px;">Fiche du jeu</td>
        </tr>
        </thead>
        @foreach($jeux as $jeu)
            <tr>
                <td>{{$jeu->id}}</td>
                <td>{{$jeu->title}}</td>
                <td>{{$jeu->annee_sortie}}</td>
                <td>{{$jeu->age_min}}</td>
                <td>{{$jeu->categorie}}</td>
                <td>{{$jeu->description}}</td>
                <!--<td><a href="{{route('jeux.show', $jeu->id)}}">Voir la fiche</a></td>-->
                <td><a href="/jeux/{{$jeu->id}}">Voir la fiche</a></td>
            </tr>
        @endforeach
    </table>
@else
    <h3>Aucun jeu répertorié</h3>
    @endif
<div class="row" style="display: block; margin: auto; margin-bottom: 3%; text-align: center;">
    <a href="/jeux/create">
        <button class="btn btn-success" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
            Créer un jeu
        </button>
    </a>
    <a href="/">
        <button class="btn btn-info" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
            Accueil
        </button>
    </a>
</div>
@endsection

