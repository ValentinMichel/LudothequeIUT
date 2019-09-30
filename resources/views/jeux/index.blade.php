
<html>
<head>
    <title>Liste des jeux</title>
</head>
<body>
<h2>La liste des jeux</h2>

@if(!empty($jeux))
    <ul>
        @foreach($jeux as $jeu)
            <li>{{$jeu['titre']}} {{$jeu['categorie']}} {{$jeu['description']}}</li>
        @endforeach
    </ul>
@else
    <h3>Aucun jeu</h3>
    @endif

</body>
</html>

