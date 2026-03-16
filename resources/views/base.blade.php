<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @vite(['resources/css/home.css'])
    <title>FreeAds</title>
</head>
<body>
   <header class="w-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container p-3">
       <h3 class="text-white">FreeAds</h3>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('home.page') }}" class="nav-link text-white">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('redirection.dashboard') }}" class="nav-link text-white">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('publication.variables')}}" class="nav-link text-white">Publier</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('connexion')}}" class="nav-link text-white">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('test')}}" class="nav-link text-white">S'inscrire</a>
                    </li>
                </ul>
             </div>     
        </div>
    </nav>
   </header>
   <main>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
