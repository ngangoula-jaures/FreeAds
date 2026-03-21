@extends('base')
@section('title', 'Connexion | FreeAds')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-5 mt-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark mb-2">Bon retour !</h3>
                    <p class="text-muted">Connectez-vous pour continuer</p>
                </div>
                
                @error('email')
                    <div class="alert alert-danger py-2 text-center small rounded-3">{{$message}}</div>
                @enderror

                <form action='{{ route('connexion') }}' method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Adresse Email</label>
                        <input type="email" class="form-control form-control-lg bg-light" placeholder="Entrez votre email" name="email" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Mot de passe</label>
                        <input type="password" class="form-control form-control-lg bg-light" placeholder="Entrez votre mot de passe" name="password" required>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-muted" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>
                    <button type='submit' class="btn btn-primary btn-lg w-100 fw-bold">
                        Se connecter
                    </button>
                    <p class="text-center mt-4 mb-0 text-muted">
                        Pas encore de compte ? <a href="{{ route('test') }}" class="text-primary fw-bold text-decoration-none">S'inscrire</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
