@extends("layout.master")
@section("title", "{$jeu->title}")
@section("content")
    @if(Auth::user()->getAuthIdentifier() == $comment->auteur_id)
        <style>
            .formulaire{
                margin-top: 2%;
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
            <form action="{{route('comments.update',$comment->id)}}" method="POST" style="">
                @csrf
                @method('PUT')
                <div class="text-center">
                    <h3>Modifier le commentaire #{{$comment->id}} du jeu {{$jeu->title}}</h3>
                    <hr class="mt-2 mb-2">
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="title"><strong>Titre du commentaire</strong></label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $comment->titre }}" style="text-align: center; font-weight: bold;">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="auteur"><strong>Auteur</strong></label>
                        <input type="text" class="form-control" name="auteur" id="auteur" value="{{$comment->auteur}}" style="text-align: center; font-weight: bold;" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="textarea-input"><strong>Commentaire</strong></label>
                        <textarea name="commentaire" id="commentaire" rows="4" class="form-control"
                                  placeholder="Description..." style="font-weight: bold;">{{ $comment->body }}</textarea>
                    </div>
                </div>
                <div class="row" style="display: block; margin: auto; text-align: center;">
                    <button class="btn btn-success" type="submit" style="display: inline; color: whitesmoke; text-decoration: none;">
                        Valider la modification
                    </button>
                    <a href="{{route('jeux.show', $jeu->id)}}">
                        <button class="btn btn-danger" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
                            Annuler la modification
                        </button>
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
    @else
    <div class="alert alert-danger font-weight-bold h3 text-center" style="margin-top: 20%;">
        Vous n'avez pas accès à l'édition de ce commentaire car vous en n'êtes pas l'auteur.
    </div>
    @endif
@endsection