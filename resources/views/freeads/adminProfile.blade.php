@extends('base')
@section('title', 'Admin Profil | FreeAds')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar -->
        <div class="col-lg-3">
            <div class="card shadow-sm border-0 sticky-top" style="top: 100px;">
                <div class="card-body p-4 text-center">
                    <!-- Dynamic Avatar Upload via clicking Image -->
                    <form action="{{ route('admin.avatar') }}" method="POST" enctype="multipart/form-data" id="avatarForm">
                        @csrf
                        @method('PATCH')
                        <label for="new-img" style="cursor: pointer;" title="Cliquez pour modifier l'avatar"> 
                            <img src="{{ $user->avatar ? Storage::url($user->avatar) : Storage::url('images/avatar.jpeg') }}" alt="Avatar" class="rounded-circle mb-3 shadow-sm border" style="width: 100px; height: 100px; object-fit: cover; transition: opacity 0.2s;" onmouseover="this.style.opacity=0.7" onmouseout="this.style.opacity=1">
                        </label>
                        <input type="file" id="new-img" name="avatar" accept="image/*" hidden onchange="this.form.submit()">
                    </form>
                    
                    <h5 class="fw-bold mb-1 text-dark">{{ $user->login }}</h5>
                    <span class="badge bg-danger text-white border mb-3 px-3 py-2 rounded-pill">Administrateur</span>
                </div>
                <div class="list-group list-group-flush border-top">
                    <a href="{{ route('admin') }}" class="list-group-item list-group-item-action py-3 fw-bold text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-grid-fill me-2" viewBox="0 0 16 16">
                            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.profile') }}" class="list-group-item list-group-item-action py-3 fw-bold active bg-danger border-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                        </svg>
                        Mon Profil
                    </a>
                    <a href="{{ route('admin.annonces') }}" class="list-group-item list-group-item-action py-3 fw-bold text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-megaphone-fill me-2" viewBox="0 0 16 16">
                            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"/>
                        </svg>
                        Toutes les Annonces
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9">
            <h2 class="fw-bold mb-4 text-dark">Profil Administrateur</h2>
            
            <div class="card shadow-sm border-0 p-4 mb-4">
                <h5 class="fw-bold mb-4 text-dark border-bottom pb-3">Informations de Connexion</h5>
                
                <div class="row g-4 mb-4">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">Nom d'utilisateur</label>
                        <p class="fs-5 fw-bold text-dark">{{ $user->login }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">Rôle système</label>
                        <p class="fs-5 text-danger fw-bold">{{ ucfirst($user->role) }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">Adresse Email</label>
                        <p class="fs-5 text-dark">{{ $user->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted">Numéro de Téléphone</label>
                        <p class="fs-5 text-dark">{{ $user->phone_number }}</p>
                    </div>
                </div>
                
                <p class="small text-muted mb-0"><i class="bi bi-info-circle me-1"></i> Cliquez sur votre photo de profil dans le menu latéral pour modifier votre Avatar.</p>
            </div>

            <div class="card shadow-sm border-0 p-4">
                <h5 class="fw-bold mb-4 text-dark border-bottom pb-3">Résumé du Système</h5>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="bg-danger text-white rounded p-4 text-center">
                            <h2 class="display-4 fw-bold mb-0 text-white">{{ count((array)$adsCount ?? []) > 0 ? $adsCount : '0' }}</h2>
                            <span class="small opacity-75">Annonces sur la plateforme</span>
                        </div>
                    </div>
                    <div class="col">
                        <p class="text-muted mb-0">En tant qu'administrateur, vous pouvez gérer les <strong>{{ count((array)$adsCount ?? []) > 0 ? $adsCount : '0' }}</strong> annonces des utilisateurs, ajouter ou supprimer des catégories et bloquer des utilisateurs depuis le Dashboard.</p>
                        <a href="{{ route('admin') }}" class="btn btn-sm btn-outline-danger mt-3 fw-bold px-4">Aller à l'administration complète</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
