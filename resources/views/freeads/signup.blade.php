@extends('layout')

@section('titre')
    <title>S'inscrire | Freeads</title>
@endsection

@section('styles')
        @vite([''])
@endsection

@section('container')

<div>
    @php
       //Request $name 
    @endphp
    </div>
<form action="{{ route('signup') }}" method="POST">
        @csrf
        <input type="text" name="login" placeholder="Met ton ton nom"  value="{{old('login')}}"><br>
            @error('login')
                <span>{{$message}}</span>
            @enderror
        <br>
        <input type="email" name="email" placeholder="Email"  value="{{old('email')}}"><br>
            @error('email')
                <span>{{$message}}</span>
            @enderror
        <br>
        <input type="password" name="password" placeholder="Mot de passe"><br>
        <br>
        <input type="password" name="password_confirmation" placeholder="Retapez le mot de passe" ><br>
            @error('password')
                <span>{{$message}}</span>
            @enderror
        <br>
        <input type="tel" name="phone_number" placeholder="Numero de tel" value="{{old('phone_number')}}"> <br>
            @error('phone_number')
                <span>{{$message}}</span>
            @enderror
        <br>
        <button type="submit">S'inscrire</button>
    </form>
@endsection
