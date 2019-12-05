@extends('layout.admin')
@section('title', 'Dashboard')
@section('content')

<div class="row wow fadeIn">
    <div class="mb-4 col-6">
        <!--Card-->
        <div class="card">
            <div class="card-header font-weight-bold text-center text-uppercase">Statistiques</div>
            <!--Card content-->
            <div class="card-body">

                <!-- List group links -->
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action waves-effect">Utilisateurs :
                        <span class="badge badge-primary badge-pill float-right">{{$nbUsers}}
                            <i class="fas fa-arrow-up ml-1"></i>
                        </span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Nombre de jeux :
                        <span class="badge badge-primary badge-pill float-right">{{$nbJeux}}
                            <i class="fas fa-arrow-up ml-1"></i>
                        </span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Commentaires :
                        <span class="badge badge-primary badge-pill float-right">{{$nbComments}}
                            <i class="fas fa-arrow-up ml-1"></i>
                        </span>
                    </a>
                    <a class="list-group-item list-group-item-action waves-effect">Nombre de tags :
                        <span class="badge badge-primary badge-pill float-right">{{$nbTags}}
                            <i class="fas fa-arrow-up ml-1"></i>
                        </span>
                    </a>
                </div>
                <!-- List group links -->

            </div>
        </div>
        <!--/.Card-->
    </div>
</div>

@endsection