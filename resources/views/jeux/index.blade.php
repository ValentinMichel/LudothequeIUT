
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Liste des jeux</title>
</head>
<body>
<h2 style="text-align: center; width: 100%;">La liste des jeux</h2>
@if(!empty($jeux))
    <table class="table table-striped table-hover table-bordered table-responsive" style="margin-left: auto; margin-right: auto; width: 80%;">
        <thead class="">
        <tr>
            <td scope="col">#</td>
            <td scope="col">Title</td>
            <td scope="col">Year</td>
            <td scope="col">Recommanded Age</td>
            <td scope="col">Type</td>
            <td scope="col">Description</td>
        </tr>
        </thead>
        @foreach($jeux as $jeu)
            <tr>
                @foreach($jeu as $elt)
                    <td>{{$elt}}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
@else
    <h3>Aucun jeu</h3>
    @endif
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

