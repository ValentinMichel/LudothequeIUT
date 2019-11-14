
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>{{$jeu->title}}</title>
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
</head>
<body>
<div>
    <div class="titre_jeu">{{$jeu->title}}</div>
    @if(!empty($comments))
        @foreach ($comments as $comment)
            <table class="table table-striped table-hover table-bordered" style="margin-left: auto; margin-right: auto; width: 80%; margin-top: 3%;">
                <thead>
                <tr>
                    <td colspan="2" style="text-align: center; font-size: larger; font-family: 'Trebuchet MS;',sans-serif">
                        Commentaire #{{$comment->id}}
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
            </table>
        @endforeach
    @else
        <h5 style="text-align: center; color: rgb(218, 43, 14);">Aucun commentaire pour ce jeu actuellement.</h5>
    @endif
    <div class="backToPage">
        @if($action=='delete')
            <!-- à faire si nécessaire -->
        @else
            <a href="{{route('jeux.index')}}"><button class="btn btn-info">Retour à la liste des jeux</button></a>
            <a href="{{route('jeux.show', $jeu->id)}}"><button class="btn btn-primary">Voir le jeu</button></a>
            <a href="{{url(route('comments.create')) . '?' . http_build_query(['id' => $jeu->id])}}"><button class="btn btn-success">Ajouter un commentaire</button></a>

            @endif
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

