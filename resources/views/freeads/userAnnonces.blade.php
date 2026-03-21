@extends('base')
@section('title', 'Mes Annonces | FreeAds')

@section('content')
<div class="container py-5">

    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-lg-3">
            <div class="card shadow-sm border-0 sticky-top" style="top: 100px;">
                <div class="card-body p-4 text-center">
                    <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : Storage::url('images/avatar.jpeg') }}" alt="Avatar" class="rounded-circle mb-3 shadow-sm border" style="width: 100px; height: 100px; object-fit: cover;">
                    <h5 class="fw-bold mb-1 text-dark">{{ Auth::user()->login }}</h5>
                    <span class="badge bg-light text-muted border mb-3 px-3 py-2 rounded-pill">{{ ucfirst(Auth::user()->role) }}</span>
                </div>
                <div class="list-group list-group-flush border-top">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action py-3 fw-bold text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-grid-fill me-2" viewBox="0 0 16 16">
                            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
                        </svg>
                        Tableau de bord
                    </a>
                    <a href="{{ route('user.profile') }}" class="list-group-item list-group-item-action py-3 fw-bold text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
                        Mon Profil
                    </a>
                    <a href="{{ route('user.annonces') }}" class="list-group-item list-group-item-action py-3 fw-bold active bg-primary border-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-megaphone-fill me-2" viewBox="0 0 16 16">
                            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
                        </svg>
                        Mes Annonces
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold text-dark m-0">Mes Annonces</h2>
                <a href="{{ route('publication.variables') }}" class="btn btn-primary fw-bold px-4">Créer une annonce</a>
            </div>

            <!-- Search bar -->
            <div class="card shadow-sm border-0 mb-4 p-3">
                <form action="{{ route('userAnnonces.Actions') }}" method="POST" class="d-flex gap-2 w-100 mb-0">
                    @csrf
                    <input class="form-control bg-light" type="search" name="q" placeholder="Rechercher dans vos annonces..." value="{{ request('q') }}" />
                    <button class="btn btn-outline-primary fw-bold" type="submit">Rechercher</button>
                </form>
            </div>

            @if(isset($status) && $status)
                <div class="alert alert-info text-center fw-bold">{{ $status }}</div>
            @endif
            
            @if(isset($ads) && count($ads) > 0)
                <div class="row g-4">
                    @foreach($ads as $ad)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 position-relative">
                            <!-- Image -->
                            <a href="{{ route('annonces.id', ['id'=>$ad->id]) }}" class="text-decoration-none text-dark">
                                <img src="{{ Storage::url($photos[$ad->id]['path']) }}" class="card-img-top w-100" style="height: 180px; object-fit: cover;" alt="{{ $ad->title }}">
                            </a>
                            
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold mb-2 text-truncate" title="{{ $ad->title }}">{{ $ad->title }}</h5>
                                <div class="d-flex justify-content-between align-items-center mb-3 text-muted small">
                                    <span class="badge bg-light text-dark px-2 py-1 border">{{ $ad->condition }}</span>
                                    <span class="fw-bold text-price-yellow fs-5">{{ number_format($ad->price, 0, ',', ' ') }} FCFA</span>
                                </div>
                                
                                <form action="{{ route('userAnnonces.Actions') }}" method="POST" class="mt-auto">
                                    @csrf
                                    <input type="hidden" name="deleteAds" value="{{ $ad->id }}">
                                    <button type="submit" class="btn btn-outline-danger w-100 fw-bold btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill me-1" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>

                <div class="mt-4 pb-5">
                    {{ $ads->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection