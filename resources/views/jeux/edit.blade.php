<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Modification du jeu {{$jeu->title}}</title>
    <style>
        .formulaire{
            margin-top: 2%;
            margin-bottom: 2%;
            width: 75%;
            margin-left: auto;
            margin-right: auto;
        }
        .formulaire>form{
            border: 1px solid rgba(0, 0, 0, 0.2) !important;
            border-radius: 5px !important;
            background-color: whitesmoke;
            padding: 3%;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="formulaire">
    <form action="{{route('jeux.update',$jeu->id)}}" method="POST" style="">
        @csrf
        @method('PUT')
        <div class="text-center">
            <h3>Modification d'un jeu</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="title"><strong>Titre du jeu</strong></label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $jeu->title }}" style="text-align: center; font-weight: bold;">
            </div>
            <div class="form-group col-md-4">
                <label for="year"><strong>Année de sortie</strong></label>
                <input type="number" class="form-control" name="year" id="year" value="{{ $jeu->annee_sortie }}" style="text-align: center; font-weight: bold;">
            </div>
            <div class="form-group col-md-4">
                {{-- la catégorie  --}}
                <label for="categorie"><strong>Catégorie</strong></label>
                <select class="form-control" id="categorie"  name="categorie" style="text-align: center; font-weight: bold;">
                    <option>{{ $jeu->categorie }}</option>
                    <option>RPG</option>
                    <option>BattleRoyal</option>
                    <option>Open World</option>
                    <option>MMORPG</option>
                    <option>FPS</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                {{-- la date d'expiration  --}}
                <label for="age_min"><strong>Âge minimum</strong></label>
                <input type="text" class="form-control" name="age_min" id="age_min" value="{{ $jeu->age_min }}" style="text-align: center; font-weight: bold;">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="textarea-input"><strong>Description</strong></label>
                <textarea name="description" id="description" rows="4" class="form-control"
                          placeholder="Description..." style="font-weight: bold;">{{ $jeu->description }}</textarea>
            </div>
        </div>
        <div class="row" style="display: block;">
            <button class="btn btn-success" type="submit" style="margin-left: 30%;">Valider la modification</button>
            <a href="{{route('jeux.show', $jeu->id)}}"  style="margin-right: 30%;">
                <input class="btn btn-danger" type="button" value="Annuler la modification">
            </a>
        </div>
    </form>
</div>
@if ($errors->any())
    <div style="border-radius: 2px; background-color: whitesmoke; color: rgba(0, 0, 0, 0.5); width: 40%; margin: auto; margin-bottom: 3%; border-radius: 8px; box-shadow: 1px 3px 7px rgba(0, 0, 0, 0.3);">
        <div style="color: rgba(255, 255, 255, 1); background-color: rgba(248, 43, 13, 0.7); width: 100%; font-size: 50px; height: 70px; text-align: center; border-top-right-radius: 8px; border-top-left-radius: 8px; ">
            <i class="fas fa-exclamation-triangle" style="padding: 8px;"></i>
        </div>
        <div style="padding: 2%;">
            <span style="text-align: center; color: rgba(248, 43, 13, 0.7); font-weight: bold;">Following error must be corrected...</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>