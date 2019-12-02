@extends("layout.master")
@section("title", "Commentaires")
@section("content")
<style>
    .td-title{
        font-weight: bold;
    }
</style>

<div>
    @if(!empty($comments))
        @foreach ($comments as $comment)
            <table class="table table-striped table-hover table-bordered" style="margin-left: auto; margin-right: auto; margin-top: 3%;">
                <thead>
                <tr>
                    <td colspan="2" style="text-align: center; font-size: larger; font-family: 'Trebuchet MS;', sans-serif">
                        Commentaire #{{$comment->id}}
                        <form action="{{route('comments.destroy', $comment->id)}}" method="POST" style="display: inline !important;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" value="valideFromIndex" style="background-color: white; border: none; float: right; color: rgba(255,47,56,0.71);"><i class="fas fa-times" style="float: right; color: rgba(255,47,56,0.71);"></i></button>
                        </form>
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
                    <td>{{$comment->updated_at}}</td>
                </tr>
                <tr>
                    <td style="width: 160px;" class="td-title">Lié au jeu n°</td>
                    <td>{{$comment->jeux_id}} <a href="/jeux/{{$comment->jeux_id}}">(voir le jeu)</a></td>
                </tr>
            </table>
        @endforeach
    @else
        <h3>Aucun commentaire répertorié</h3>
    @endif
    <div class="row" style="display: block; margin: auto; margin-bottom: 3%; text-align: center;">
        <a href="/">
            <button class="btn btn-info" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
                Accueil
            </button>
        </a>
    </div>
</div>

@endsection
