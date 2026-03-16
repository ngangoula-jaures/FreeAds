@extends('base')
@section('content')
<div class="row justify-content-center mt-5 d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-4 ">
        <div class="card p-4">
            <h3 class="text-center mb-4 text-primary">Connexion</h3>
            
            @error('email')
                <span>{{$message}}</span>
            @enderror
            <form action='{{ route('connexion') }}' method="post">
                @csrf
                <div class="mb-4">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Entrez votre email" name="email" required>
                    
                </div>
                <div class="mb-4">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Entrez votre mot de passe" name="password" required>
                </div>
                <div class="col-md-12 justify-content-center my-2">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember">Se souvenir de moi</label>
                </div>
                <button type='submit' class="btn btn-primary w-100">
                    Se connecter
                </button>
                <p class="text-center mt-3">
                    Pas de compte ? <a href="{{ route('test') }}">S'inscrire</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
