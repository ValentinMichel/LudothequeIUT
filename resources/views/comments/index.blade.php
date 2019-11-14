
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>A faire</title>
    <style>
        .td-title{
            font-weight: bold;
        }
        .backToPage{
            text-align: center;
            margin-bottom: 3%;
        }
    </style>
</head>
<body>
<div>
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
                <tr>
                    <td style="width: 160px;" class="td-title">Lié au jeu n°</td>
                    <td>{{$comment->jeux_id}} <a href="{{route('jeux.show', $comment->jeux_id)}}">(voir le jeu)</a></td>
                </tr>
            </table>
        @endforeach
    @else
        <h3>Aucun commentaire répertorié</h3>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

