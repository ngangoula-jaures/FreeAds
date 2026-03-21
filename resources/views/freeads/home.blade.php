@extends('base')

@section('content')
    <!-- Hero Section -->
    <div class="bg-primary text-white py-5 mb-5" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);">
        <div class="container text-center py-5">
            <h1 class="fw-bold display-5 mb-3">Trouvez les meilleures annonces près de chez vous</h1>
            <p class="lead mb-0 opacity-75">Achetez et vendez facilement, rapidement et en toute sécurité.</p>
        </div>
    </div>

    <div class="container pb-5">
        <!-- Search & Filter Card -->
        <div class="card shadow-sm mb-5 border-0 p-4" style="margin-top: -60px; z-index: 10;">
            <form action="{{ route('home.page') }}" method="GET" class="row g-3 align-items-end justify-content-center">
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">Recherche</label>
                    <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Que cherchez-vous ?">
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">Catégorie</label>
                    <select class="form-select" name="category_id">
                        <option value="">Toutes les catégories</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label text-muted small fw-bold">Localisation</label>
                    <select class="form-select" name="location_id">
                        <option value="">Partout</option>
                        @foreach ($locations as $location)
                        <option value="{{ $location->id }}" {{ request('location_id') == $location->id ? 'selected' : '' }}>{{ $location->ville }}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label text-muted small fw-bold">Prix Maximum</label>
                    <input type="number" min="0" class="form-control" name="max_price" value="{{ request('max_price') }}" placeholder="ex: 50000">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100 fw-bold" style="height: 48px;">Rechercher</button>
                    @if(request()->anyFilled(['q', 'category_id', 'location_id', 'max_price']))
                        <a href="{{ route('home.page') }}" class="d-block text-center mt-2 small text-muted text-decoration-underline">Effacer les filtres</a>
                    @endif
                </div>
            </form>
        </div>

        <h3 class="mb-4 fw-bold text-dark text-center">Dernières Annonces</h3>

        <div class="row g-4 mb-5">
        @foreach ( $ads as $ad)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 text-decoration-none">
                    <img src="{{ Storage::url($photos[$ad->id]['path']) }}" class="card-img-top w-100" alt="{{ $ad->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-dark fw-bold mb-2 text-truncate" title="{{ $ad->title }}">{{ $ad->title }}</h5>
                        <p class="text-price-yellow fs-5 mb-3 fw-bold">{{ number_format($ad->price, 0, ',', ' ') }} FCFA</p>
                        <a href="{{ route('annonces.id', ['id'=>$ad->id]) }}" class="btn btn-outline-primary w-100 mt-auto">Voir l'annonce</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

        <nav aria-label="Navigation des pages" class="mt-5">
            <ul class="pagination justify-content-center">
                {{ $ads->links() }}
            </ul>
        </nav>
    </div>
@endsection