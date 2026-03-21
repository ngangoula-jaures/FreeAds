@extends('base')
@section('title', 'Tableau de bord | FreeAds')

@section('content')
<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success fw-bold text-center mb-4 rounded-3">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-lg-3">
            <div class="card shadow-sm border-0 sticky-top" style="top: 100px;">
                <div class="card-body p-4 text-center">
                    <img src="{{ $user->avatar ? Storage::url($user->avatar) : Storage::url('images/avatar.jpeg') }}" alt="Avatar" class="rounded-circle mb-3 shadow-sm border" style="width: 100px; height: 100px; object-fit: cover;">
                    <h5 class="fw-bold mb-1 text-dark">{{ $user->login }}</h5>
                    <span class="badge bg-light text-muted border mb-3 px-3 py-2 rounded-pill">{{ ucfirst($user->role) }}</span>
                </div>
                <div class="list-group list-group-flush border-top">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action py-3 fw-bold active bg-primary border-primary">
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
                    <a href="{{ route('user.annonces') }}" class="list-group-item list-group-item-action py-3 fw-bold text-muted">
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
            <h2 class="fw-bold mb-4 text-dark">Aperçu du compte</h2>
            
            <div class="row g-4 mb-5">
                <!-- Stat: Total Annonces -->
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100 bg-primary text-white">
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fw-bold m-0 opacity-75">Mes Annonces</h6>
                                <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 48px; height: 48px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.496 1.398-5 2V8h5V2.511zM1.5 5.25v6.5l5 2v-6.5l-5-2zM8.5 13.75v-6.5l5-2v6.5l-5 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <h2 class="display-5 fw-bold mb-0">{{ $adsCount }}</h2>
                        </div>
                    </div>
                </div>

                <!-- Stat: Total Ventes -->
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fw-bold m-0 text-muted">Achetées</h6>
                                <div class="bg-light text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>
                                </div>
                            </div>
                            <h2 class="display-5 fw-bold text-dark mb-0">7</h2>
                        </div>
                    </div>
                </div>

                <!-- Stat: En attente -->
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h6 class="fw-bold m-0 text-muted">En attente</h6>
                                <div class="bg-light text-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16">
                                        <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 14v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.524a3.5 3.5 0 0 0 1.954 1.838A1.5 1.5 0 0 1 8 5.5v5a1.5 1.5 0 0 1-1.209 1.472 3.5 3.5 0 0 0-1.954 1.838A3.498 3.498 0 0 0 4.5 14v1h7v-1c0-.537-.12-1.045-.337-1.524a3.5 3.5 0 0 0-1.954-1.838A1.5 1.5 0 0 1 8 10.5v-5a1.5 1.5 0 0 1 1.209-1.472 3.5 3.5 0 0 0 1.954-1.838A3.498 3.498 0 0 0 11.5 3V2h-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <h2 class="display-5 fw-bold text-dark mb-0">2</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0 text-dark">Activité Récente</h5>
                    <a href="{{ route('user.annonces') }}" class="btn btn-sm btn-outline-primary fw-bold px-3">Voir toutes les annonces</a>
                </div>
                <div class="text-center py-5">
                    <div class="text-muted mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-activity opacity-50" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2Z"/>
                        </svg>
                    </div>
                    <h6>Bienvenue sur votre compte de vente et d'achat !</h6>
                    <p class="text-muted small">Explorez le site, publiez vos produits, et suivez vos statistiques ici.</p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
