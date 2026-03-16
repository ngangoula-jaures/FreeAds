@extends('layout')

@section('titre')
    <title>Mail | Freeads</title>
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
<form action="{{ route('test') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email"  value="{{old('email')}}"><br>
            @error('email')
                <span>{{$message}}</span>
            @enderror
        <button type="submit">envoyer</button>
    </form>
@endsection

