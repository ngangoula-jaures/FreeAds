@extends('base')

    @section('content')
        <div class="container mt-5">
            
            <div class="text-center mb-5">
                <h2 class="fw-bold">Trouver les meilleures annonces</h2>
                <p class="text-muted">Achetez et vendez facilement</p>
            </div>

            <div class="card shadow-sm mb-5 border-0 bg-light p-4">
                <form class="row g-3 align-items-center justify-content-center">
                    <div class="col-md-3">
                        <input type="text" class="form-control" placeholder="Rechercher un produit">
                    </div>
                    <div class="col-md-2">
                        <select class="form-select">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>  
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select class="form-select">
                            @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->ville }}</option>  
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" placeholder="Prix max">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Rechercher</button>
                    </div>
                </form>
            </div>

            <h3 class="mb-4 text-center fw-bold">Annonces</h3>

            <div class="row g-4 mb-5">
            @foreach ( $ads as $ad)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ Storage::url($photos[$ad->id]['path']) }}" class="card-img-top w-100" style="height: 250px; object-fit: cover;" alt="{{ $ad->title }}">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <p class="text-primary fw-bold fs-5 mb-4">{{ $ad->price }}</p>
                            <a href="{{ route('annonces.id', ['id'=>$ad->id]) }}" class="btn btn-primary w-100 mt-auto">Voir l'annonce</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>

            <nav aria-label="Navigation des pages" class="mt-5 mb-5">
                <ul class="pagination justify-content-center">
                    {{ $ads->links() }}
                </ul>
            </nav>

        </div>
    </main>

    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row text-center text-md-start">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold text-uppercase">FreeAds</h5>
                    <p class="text-secondary">Achetez et vendez facilement vos produits partout.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold text-uppercase">Liens rapides</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-white">Accueil</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-white">Annonces</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-white">Connexion</a></li>
                        <li class="mb-2"><a href="#" class="text-secondary text-decoration-none hover-white">Inscription</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold text-uppercase">Contact</h5>
                    <p class="text-secondary mb-1">Email: contact@freeads.com</p>
                    <p class="text-secondary">Téléphone: +225 00 00 00 00</p>
                </div>
            </div>
            <div class="text-center pt-4 border-top border-secondary mt-2">
                <p class="mb-0 text-secondary">&copy; 2026 FreeAds - Tous droits réservés</p>
            </div>
        </div>
    </footer>
@endsection