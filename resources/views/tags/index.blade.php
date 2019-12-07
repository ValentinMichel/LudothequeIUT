@extends("layout.master")
@section("title", "Liste des tags")
@section("content")
<div>
    @if(!empty($tags))
        <table class="table table-bordered" style="margin-left: auto; margin-right: auto; margin-top: 3%;">
            <thead>
            <tr>
                <td colspan="2" style="text-align: center; font-size: larger; font-family: 'Trebuchet MS;',sans-serif">
                    Table des tags
                </td>
            </tr>
            </thead>
            <tr>
                <td>
                @foreach ($tags as $tag)
                    <span style="border: 1px solid rgba(0,0,0,0.1); border-radius: 5px; padding: 5px; margin: 5px; line-height: 50px;">{{$tag->label}}
                        <form action="{{route('tags.destroy', $tag->id)}}" method="POST" style="display: inline !important;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" value="valide" style="border: none; height: 2vh; color: rgba(255,47,56,0.71);"><i class="fas fa-times" style="float: right; color: rgba(255,47,56,0.71);"></i></button>
                        </form>
                    </span>
                @endforeach
                </td>
            </tr>
        </table>
    @else
        <h3>Aucun tag répertorié</h3>
    @endif
    <div class="row" style="display: block; margin: auto; margin-bottom: 3%; text-align: center;">
        <a href="{{route('tags.create')}}" style="text-decoration: none;">
            <button class="btn btn-success" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
                Ajouter
            </button>
        </a>
        <a href="{{route('home')}}" style="text-decoration: none;">
            <button class="btn btn-info" type="button" style="display: inline; color: whitesmoke; text-decoration: none;">
                Accueil
            </button>
        </a>
    </div>
</div>
@endsection


