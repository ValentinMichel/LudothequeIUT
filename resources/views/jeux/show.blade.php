@extends("layout.master")
@section('title', "{$jeu->title}")
@section("content")
<style>
    .td-title{
        font-weight: bold;
    }
    .backToPage{
        text-align: center;
    }
</style>

<div>
<table class="table table-striped table-hover table-bordered" style="margin-left: auto; margin-right: auto; width: 100%; margin-top: 5%;">
    <thead>
    <tr>
        <td colspan="2" style="text-align: center; font-size: larger; font-family: 'Trebuchet MS;',sans-serif">
            {{$jeu->title}}
        </td>
    </tr>
    </thead>
    <tr>
        <td style="width: 160px;" class="td-title">Identifiant du jeu</td>
        <td>{{$jeu->id}}</td>
    </tr>
    <tr>
        <td class="td-title">Année de sortie</td>
        <td>{{$jeu->annee_sortie}}</td>
    </tr>
    <tr>
        <td class="td-title">Âge minimum</td>
        <td>{{$jeu->age_min}}</td>
    </tr>
    <tr>
        <td class="td-title">Catégorie</td>
        <td>{{$jeu->categorie}}</td>
    </tr>
    <tr>
        <td class="td-title">Description</td>
        <td>{{$jeu->description}}</td>
    </tr>
    <tr>
        <td class="td-title">Tags</td>
        <td>
        @foreach($tags as $tag)
            <span style="border: 1px solid rgba(0,0,0,0.1); border-radius: 5px; padding: 5px;">{{$tag->label}}</span>
        @endforeach
        </td>
    </tr>
</table>
</div>
<div class="backToPage">
    @if($action=='delete')
        <h5 style="color: rgb(218, 43, 14);">Êtes-vous sûr de vouloir supprimer ce jeu de la base de données ?</h5>
        <form action="{{route('jeux.destroy', $jeu->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="text-center">
                <button type="submit" class="btn btn-success" name="delete" value="valide">Valider la suppression</button>
                <a href="{{route('jeux.show', $jeu->id)}}"><button type="button" class="btn btn-danger" name="delete" value="annule">Annuler la suppression</button></a>
            </div>
        </form>
    @else
        <a href="/jeux"><button class="btn btn-info">Retour à la liste des jeux</button></a>
        <a href="{{route('comments.show', $jeu->id)}}"><button class="btn btn-primary">Voir les commentaires</button></a>
        <a href="/jeux/{{$jeu->id}}/edit"><button class="btn btn-warning" style="color: darkslategray;">Modifier le jeu</button></a>
        <a href="/jeux/{{$jeu->id}}?action=delete"><button class="btn btn-danger">Supprimer le jeu</button></a>
        <!--<a href="{{url(route('jeux.show', $jeu->id)) . '?' . http_build_query(['action' => 'delete'])}}"><button class="btn btn-danger">Supprimer le jeu</button></a>-->
    @endif
</div>

@endsection