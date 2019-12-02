@extends("layout.master")
@section("title", "{$jeu->title}")
@section("content")
<style>
    .formulaire{
        margin-top: 4%;
        margin-bottom: 2%;
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
            <div class="form-group col-md-4">
                <label><strong>Tags</strong></label>
                <select class="form-control" multiple="multiple" name="tags[]" style="font-weight: bold;">
                    @php
                        foreach ($tags as $tag){
                            echo "<option value='".$tag->id."'".(in_array($tag->label, $currentTags) ? "selected" : "").">".$tag->label."</option>";
                        }
                    @endphp
                </select>
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
            <span style="text-align: center; color: rgba(248, 43, 13, 0.7); font-weight: bold;">Les erreurs suivantes doivent être corrigées...</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@endsection