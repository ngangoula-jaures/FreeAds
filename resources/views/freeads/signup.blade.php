@extends('base')
@section('title', 'Inscription complète | FreeAds')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 p-5 mt-2">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark mb-2">Finalisez votre Inscription</h3>
                    <p class="text-muted">Plus que quelques informations pour créer votre compte.</p>
                </div>
                <form method="POST" action="{{ route('inscription') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted" for="login">Nom d'utilisateur</label>
                        <input class="form-control bg-light" type="text" name="login" id="login" required placeholder="Choisissez un pseudo">
                        @error('login')<div class="text-danger small mt-1">{{$message}}</div>@enderror
                    </div>
                        
                    <input type="hidden" name="token" value="{{ $verifToken->token }}">

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted" for="phone_number">Numéro de téléphone</label>
                        <input class="form-control bg-light" type="tel" name="phone_number" id="phone_number" required placeholder="Ex: 0102030405">
                        @error('phone_number')<div class="text-danger small mt-1">{{$message}}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold text-muted" for="password">Mot de passe</label>
                            <input class="form-control bg-light" type="password" name="password" id="password" required placeholder="Mot de passe">
                            @error('password')<div class="text-danger small mt-1">{{$message}}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label small fw-bold text-muted" for="password_confirmation">Confirmation</label>
                            <input class="form-control bg-light" type="password" name="password_confirmation" id="password_confirmation" required placeholder="Confirmez">
                        </div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-muted small" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">S'inscrire</button>
                    
                    <p class="text-center mt-4 mb-0 text-muted">
                        Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Se connecter</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection