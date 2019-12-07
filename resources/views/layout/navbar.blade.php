<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark default-color font-weight-bold">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="{{route('home')}}">Ludothèque</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Application</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('jeux.index')}}">Liste des jeux</a>
                    <a class="dropdown-item" href="{{route('comments.index')}}">Liste des commentaires</a>
                    <a class="dropdown-item" href="{{route('tags.index')}}">Liste des tags</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.about')}}">À propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('home.contact')}}">Contactez-nous</a>
            </li>



        </ul>
        <!-- Links -->

    <!-- Collapsible content -->
    @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
            @auth
                @if(Auth::user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin')}}">
                            <i class="fas fa-user-shield" style="display: inline; margin-right: 1%;"></i>Administration
                        </a>
                    </li>
                @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                    <a class="dropdown-item" href="#">Mon compte</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"> {{ __('Déconnexion') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endif
            @endauth
        </ul>
    @endif
    </div>
</nav>
