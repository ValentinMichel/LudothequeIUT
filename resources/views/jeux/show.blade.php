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
<table class="table table-striped table-hover table-bordered" style="margin-left: auto; margin-right: auto; width: 100%; margin-top: 3%;">
    <thead>
    <tr>
        <td colspan="2" style="text-align: center; font-size: larger; font-family: 'Trebuchet MS;',sans-serif">
            {{$jeu->title}}
        </td>
    </tr>
    </thead>
    @if($jeu->image !== null)
    <tr>
        <td colspan="2"><img src="{{url('storage/images/'.$jeu->image)}}" style="margin: auto; display: block; max-width: 100%; max-height: 40vh;"></td>
    </tr>
    @endif
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
        <a href="/jeux"><button class="btn btn-info font-weight-bold">Retour</button></a>
        <a href="{{route('comments.show', $jeu->id)}}"><button class="btn btn-primary font-weight-bold">Voir les commentaires</button></a>
        <a href="/comments/create?id={{$jeu->id}}"><button class="btn btn-success font-weight-bold">Ajouter un commentaire</button></a>
        <a href="/jeux/{{$jeu->id}}/edit"><button class="btn btn-warning white-text font-weight-bold" style="color: darkslategray;">Éditer</button></a>
        <a href="/jeux/{{$jeu->id}}?action=delete"><button class="btn btn-danger font-weight-bold">Supprimer</button></a>
        <!--<a href="{{url(route('jeux.show', $jeu->id)) . '?' . http_build_query(['action' => 'delete'])}}"><button class="btn btn-danger">Supprimer le jeu</button></a>-->
    @endif
    <!-- Modif du 6 décembre -->
    @if(!empty($comments))
        @foreach ($comments as $comment)
            <table class="table table-striped table-hover table-bordered" style="margin-left: auto; margin-right: auto; margin-top: 2%;">
                <thead>
                <tr>
                    <td colspan="2" style="text-align: center; font-size: larger; font-family: 'Trebuchet MS;', sans-serif">
                        Commentaire #{{$comment->id}}
                        @auth
                            @if(\Illuminate\Support\Facades\Auth::user()->getAuthIdentifier() == $comment->auteur_id)
                                <form action="{{route('comments.destroy', [$comment->id])}}" method="POST" style="display: inline !important;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="delete" class="float-right" value="valideFromShow" style="padding-right: 2%; background-color: white; border: none; color: rgba(255,47,56,0.71);"><i class="fas fa-times" style="color: rgba(255,47,56,0.71);"></i></button>
                                </form>
                                <div class="float-left" style="padding-left: 2%;">
                                    <a href="{{route('comments.edit', $comment->id)}}">
                                        <i class="fas fa-edit" style="color: rgba(255,116,55,0.71);"></i>
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </td>
                </tr>
                </thead>
                <tr>
                    <td style="width: 160px;" class="td-title">Auteur</td>
                    <td>{{$comment->auteur}}</td>
                </tr>
                <tr>
                    <td style="width: 160px;" class="td-title">Titre du commentaire</td>
                    <td>{{$comment->titre}}</td>
                </tr>
                <tr>
                    <td style="width: 160px;" class="td-title">Contenu commentaire</td>
                    <td>{{$comment->body}}</td>
                </tr>
                <tr>
                    <td style="width: 160px;" class="td-title">Publié le</td>
                    <td>{{$comment->created_at->format('l jS \\of F Y h:i:s A')}}</td>
                </tr>
                @if($comment->created_at != $comment->updated_at)
                    <tr>
                        <td style="width: 160px;" class="td-title">Édité le</td>
                        <td>{{$comment->updated_at->format('l jS \\of F Y h:i:s A')}}</td>
                    </tr>
                @endif
            </table>
        @endforeach
    @else
        <h5 style="text-align: center; color: rgb(218, 43, 14);">Aucun commentaire pour ce jeu actuellement.</h5>
    @endif
</div>

@endsection