@extends('base')
@section('title', 'Vérification Email | FreeAds')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-5 mt-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark mb-2">Première Étape</h3>
                    <p class="text-muted">Veuillez vérifier votre email pour commencer l'inscription.</p>
                </div>
                <form method="POST" action="{{ route('test') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted" for="email">Adresse Email</label>
                        <input class="form-control form-control-lg bg-light" type="email" name="email" id="email" value="{{old('email')}}" required placeholder="Entrez votre adresse email">
                         @error('email')
                            <div class="text-danger small mt-2 fw-bold">{{$message}}</div>
                        @enderror
                    </div>
                 
                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">Valider mon Email</button>
                    <p class="text-center mt-4 mb-0 text-muted">
                        Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-primary fw-bold text-decoration-none">Se connecter</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
