@extends('base')

@section('title')
    Inscription |Freeads
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4 d-flex  align-items-center vh-100">
        <div class="card p-4 ">
            <h3 class="text-center mb-4 text-primary">Inscription</h3>
                <form method="POST" action="{{ route('inscription') }}" class="row g-3">
                    @csrf
                    <div class="md-3">
                        <label class="form-label" for="Username" >Nom Utilisateur</label>
                        <input class="form-control" type="text" name="login" id="login" required placeholder="Entrez votre nom">
                    </div>
                        
                    <input class="form-control" type="hidden" name="token"  value="{{ $verifToken->token }}">

                    <div class="md-3">
                        <label class="form-label" for="Password">Mot de passe </label>
                        <input class="form-control" type="password" name="password" id="password" required placeholder="Entrez votre mot passe">
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="Password confirmation">Confirmez votre Mot de passe!</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required placeholder="Confirmer votre mot de passe">
                    </div>
                    <div class="md-3">
                        <label class="form-label" for="number">Numero de téléphone</label>
                        <input class="form-control" type="tel" name="phone_number" id="phone_number" required placeholder="Entez votre numero de téléphone">
                    </div>
                    <div class="col-md-12 justify-content-center my-2">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Se souvenir de moi</label>
                    </div>
                    <div class="col-md-12 justify-content-center my-2">
                        <button type="submit" class=" btn btn-primary w-100 rounded-3 px-5">S'inscrire</button>
                    </div>
                    
                    <p class="text-center mt-3">
                        déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
                    </p>
                </form>
        </div>
    </div>
</div>
@endsection
        