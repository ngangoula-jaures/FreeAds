@extends('layout')

@section('titre')
    testPage
@endsection('titre')

@section('form')

<div>
    @php
       //Request $name 
    @endphp
    </div>
<form action="" method="post">
        {{ csrf_field() }}
        <input type="text" name="name" placeholder="met ton ton nom">   
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="number" name="phone" placeholder="Numero de tel">
        <input type="submit" value="S'inscrire">
    </form>
@endsection
