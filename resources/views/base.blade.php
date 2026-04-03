<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/home.css'])
    <title>@yield('title', 'FreeAds - Projet Web')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>
<body class="d-flex flex-column min-vh-100">
   <header class="w-100 sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a href="{{ route('home.page') }}" class="navbar-brand d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-basket-fill text-primary" viewBox="0 0 16 16">
                  <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                </svg>
                FreeAds
            </a>
            <button class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a href="{{ route('home.page') }}" class="nav-link px-3">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('redirection.dashboard') }}" class="nav-link px-3">Dashboard</a>
                    </li>
                    @auth
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{route('publication.variables')}}" class="btn btn-outline-primary w-100">Publier une annonce</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-secondary w-100" type="submit">Déconnexion</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{route('connexion')}}" class="nav-link px-3">Se connecter</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a href="{{route('test')}}" class="btn btn-primary w-100">S'inscrire</a>
                    </li>
                    @endauth
                </ul>
             </div>     
        </div>
    </nav>
   </header>
   <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer class="bg-white border-top py-4 mt-auto">
        <div class="container text-center">
            <h5 class="fw-bold text-primary mb-3">FreeAds</h5>
            <p class="mb-0 text-muted fs-6">&copy; {{ date('Y') }} FreeAds. Projet Etudiants Epitech 2026 développé avec Laravel/PHP - BY NGANGOULA JAURES - KOUAKOU ANNE - KADY TRAORE.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
