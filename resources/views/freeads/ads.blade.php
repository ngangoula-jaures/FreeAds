<script>
    // Ce script vide les champs si on revient sur la page via le bouton retour
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload(); 
        }
    };
</script>

@extends('layout')

@section('titre')
    <title> 
        Publication Nouveau Artices
    </title>
@endsection

@section('styles')
        @vite(['resources/css/ads.css'])
@endsection

@section('container')

@if(session('success'))
   <div> {{ session('success') }}</div>
@endif

<div> Postez et Publiez {{ Auth::user()->login }} </div>
<form action="{{ route('publication.publier')}} " method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="title">Titre du produit :</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" 
        class="{{ $errors->has('title') ? 'input-error' : '' }}" required>
            
        @error('title')
            <div class="error-message"> {{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="category_id">Catégorie :</label>
        <select name="category_id" id="category_id" required>
            <option value="">-- Choisir une catégorie --</option>
             @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error-message"> {{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="price">Prix (FCFA) :</label>
        <input type="number" name="price" id="price" step="50" required>
        @error('price')
            <div class="error-message"> {{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="location_id">Localisation :</label>
        <select name="location_id" id="location_id" required>
            <option value="">-- Choisir une ville --</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->ville }}</option>
            @endforeach
        </select>
        @error('location_id')
            <div class="error-message"> {{ $message }}</div>
        @enderror
    </div>

    <div>
        <label>État du produit :</label><br>
        <input type="radio" name="condition" value="New" id="new" checked>
        <label for="new">Nouveau</label><br>
        
        <input type="radio" name="condition" value="Good" id="good">
        <label for="good">Remis à neuf / Bon état </label><br>
        
        <input type="radio" name="condition" value="Used" id="used">
        <label for="used">Usagé / Utilisé </label>
    </div>

    <div>
        <label for="description">Description :</label><br>
        <textarea name="description" id="description" rows="5" required></textarea>
    </div>

    <div>
        <label for="photo">Photo du produit :</label>
        <input type="file" name="photo[]" id="photo" accept="image/*" multiple required>
        @error('photo')
            <div class="error-message"> {{ $message }}</div>
        @enderror
    </div>

    <hr>
    <button type="submit">Publier l'annonce</button>
</form>
@endsection
