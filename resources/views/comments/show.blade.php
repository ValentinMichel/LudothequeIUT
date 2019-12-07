@extends("layout.master")
@section("title", "{$jeu->title}")
@section("content")
<style>
    .td-title{
        font-weight: bold;
    }
    .backToPage{
        text-align: center;
        margin-bottom: 3%;
    }
    .titre_jeu{
        text-align: center;
        margin-top: 2%;
        font-size: 50px;
        font-weight: lighter;
    }
</style>

<div>
    <div class="titre_jeu">{{$jeu->title}}</div>
    @if(!empty($comments))
        @foreach ($comments as $comment)
            <table class="table table-striped table-hover table-bordered" style="margin-left: auto; margin-right: auto; margin-top: 3%;">
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
    <div class="backToPage">
        <a href="{{route('jeux.index')}}"><button class="btn btn-info">Retour à la liste des jeux</button></a>
        <a href="{{route('jeux.show', $jeu->id)}}"><button class="btn btn-primary">Voir le jeu</button></a>
        <a href="{{route('comments.create')}}?id={{$jeu->id}}"><button class="btn btn-success">Ajouter un commentaire</button></a>
    </div>
</div>
@endsection

