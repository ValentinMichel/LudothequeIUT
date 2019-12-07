@extends('layout.master')
@section('title', 'Liste des jeux')
@section('content')
<style>
    a:hover{
        text-decoration: none;
    }
    .header-select{
        background-color: whitesmoke;
        color: rgba(0,0,0,0.6);
        border: 1px solid rgba(0,0,0,0.2);
        border-radius: 4px;
        padding: 1%;
        width: 40%;
    }
</style>
<h2 style="text-align: center; width: 100%; margin-top: 2%; text-transform: uppercase;">La liste des jeux</h2>
@if(!empty($jeux))
    <form action="{{route('jeux.index')}}" method="get" class="header-select">
        <select class="form-control col-md-7" name="categorie" style="display: inline;">
            <option value="All" @if($type == 'All') selected @endif>Tous les types</option>
            @foreach($categories as $categorie)
                <option value="{{$categorie}}" @if($type == $categorie) selected @endif>{{$categorie}}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-primary" value="Rechercher" style="display: inline; float: right">
    </form>
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
                <td><a href="{{route('jeux.show', $jeu->id)}}">Voir la fiche</a></td>
            </tr>
        @endforeach
    </table>
@else
    <h3>Aucun jeu répertorié</h3>
    @endif
<div class="row" style="display: block; margin: auto; margin-bottom: 3%; text-align: center;">
    <a href="{{route('jeux.create')}}">
        <button class="btn btn-success" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
            Créer un jeu
        </button>
    </a>
    <a href="{{route('home')}}">
        <button class="btn btn-info" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
            Accueil
        </button>
    </a>
</div>
@endsection

