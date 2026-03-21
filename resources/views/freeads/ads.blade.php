@extends('base')
@section('title', 'Publier une annonce | FreeAds')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 p-4 p-md-5 mt-2">
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-dark mb-2">Publier une annonce</h2>
                    <p class="text-muted">Remplissez les informations ci-dessous pour mettre en ligne votre produit.</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success fw-bold text-center mb-4 rounded-3">{{ session('success') }}</div>
                @endif

                <form action="{{ route('publication.publier') }}" method="POST" enctype="multipart/form-data" class="row g-4">
                    @csrf

                    <!-- Titre -->
                    <div class="col-12">
                        <label for="title" class="form-label small fw-bold text-muted">Titre de l'annonce</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" 
                        class="form-control bg-light @error('title') is-invalid @enderror" required placeholder="Ex: iPhone 13 Pro Max 256Go">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Catégorie & Localisation -->
                    <div class="col-md-6">
                        <label for="category_id" class="form-label small fw-bold text-muted">Catégorie</label>
                        <select name="category_id" id="category_id" class="form-select bg-light @error('category_id') is-invalid @enderror" required>
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label for="location_id" class="form-label small fw-bold text-muted">Localisation</label>
                        <select name="location_id" id="location_id" class="form-select bg-light @error('location_id') is-invalid @enderror" required>
                            <option value="">Où est situé le produit ?</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->ville }}</option>
                            @endforeach
                        </select>
                        @error('location_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Prix & Etat -->
                    <div class="col-md-6">
                        <label for="price" class="form-label small fw-bold text-muted">Prix (FCFA)</label>
                        <div class="input-group">
                            <input type="number" name="price" id="price" class="form-control bg-light @error('price') is-invalid @enderror" value="{{ old('price') }}" step="50" required placeholder="Ex: 500000">
                            <span class="input-group-text bg-white">FCFA</span>
                        </div>
                        @error('price') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small fw-bold text-muted d-block">État du produit</label>
                        <div class="d-flex gap-3 align-items-center mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="New" id="new" checked>
                                <label class="form-check-label text-muted" for="new">Neuf</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="Good" id="good">
                                <label class="form-check-label text-muted" for="good">Bon état</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="condition" value="Used" id="used">
                                <label class="form-check-label text-muted" for="used">Usagé</label>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload -->
                    <div class="col-12">
                        <label for="photo" class="form-label small fw-bold text-muted">Photos du produit (Max: 5)</label>
                        <input type="file" name="photo[]" id="photo" accept="image/*" multiple required class="form-control bg-light @error('photo') is-invalid @enderror">
                        <div class="form-text mt-1">Formats acceptés : JPG, PNG (Max 2Mo par image).</div>
                        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label for="description" class="form-label small fw-bold text-muted">Description de l'annonce</label>
                        <textarea name="description" id="description" rows="5" class="form-control bg-light @error('description') is-invalid @enderror" required placeholder="Décrivez votre produit en détail...">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">Publier l'annonce</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    window.onpageshow = function(event) {
        if (event.persisted) {
            window.location.reload(); 
        }
    };
</script>
@endsection
