<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark default-color">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="/">Ludothèque</a>

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
                <a class="nav-link" href="/">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Application</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/jeux">Liste des jeux</a>
                    <a class="dropdown-item" href="/comments">Liste des commentaires</a>
                    <a class="dropdown-item" href="/tags">Liste des tags</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/apropos">À propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/contact">Contactez-nous</a>
            </li>



        </ul>
        <!-- Links -->
    </div>
    <!-- Collapsible content -->
    @if (Route::has('login'))
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <ul class="navbar-nav ml-auto">
            @auth
                @if(Auth::user()->isAdmin())
                    <li class="nav-item" style="padding-right: 5%;">
                        <a class="nav-link font-weight-bold btn-teal" href="{{route('admin')}}">Administration
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
    </div>
    @endif
</nav>
