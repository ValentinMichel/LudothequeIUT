
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
        }
    </style>
</head>
<body>
<div>
<table class="table table-striped table-hover table-bordered table-responsive" style="margin-left: auto; margin-right: auto; width: 80%; margin-top: 5%;">
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
</table>
</div>
<div class="backToPage">
    <a href="{{route('jeux.index')}}"><button class="btn btn-info">Retour à la liste des jeux</button></a>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

