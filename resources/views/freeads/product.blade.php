@extends('base')
@section('title', $ad->title . ' | FreeAds')

@section('content')
<div class="container py-5">
    
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.page') }}" class="text-decoration-none text-primary fw-bold">Accueil</a></li>
            <li class="breadcrumb-item"><span class="text-muted">{{ $adCategory->name }}</span></li>
            <li class="breadcrumb-item"><span class="text-muted">{{ $adLocation->ville }}</span></li>
            <li class="breadcrumb-item active fw-bold text-dark text-truncate" style="max-width: 200px;" aria-current="page">{{ $ad->title }}</li>
        </ol>
    </nav>

    <div class="card shadow-sm border-0 p-4 mb-5">
        <div class="row g-5">
            <!-- Product Gallery -->
            <div class="col-lg-6">
                <div id="productCarousel" class="carousel slide rounded-4 overflow-hidden shadow-sm" data-bs-ride="carousel">
                    <div class="carousel-inner bg-light">
                        @foreach ($adPhotos as $photos)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <img src="{{ Storage::url($photos->path) }}" class="d-block w-100" style="height: 450px; object-fit: contain;" alt="Image {{ $loop->iteration }}">
                            </div>
                        @endforeach
                    </div>
                    @if(count($adPhotos) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 shadow" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle p-3 shadow" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>
                    @endif
                </div>

                <!-- Thumbnails -->
                @if(count($adPhotos) > 1)
                <div class="d-flex gap-2 mt-3 overflow-auto pb-2">
                    @foreach ($adPhotos as $photos)
                        <div class="cursor-pointer" style="width: 80px; height: 80px;" data-bs-target="#productCarousel" data-bs-slide-to="{{ $loop->index }}">
                            <img src="{{ Storage::url($photos->path) }}" class="w-100 h-100 rounded-3 object-fit-cover border shadow-sm" alt="Thumb">
                        </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="col-lg-6 d-flex flex-column">
                <div class="mb-auto">
                    <span class="badge bg-primary px-3 py-2 rounded-pill mb-3 fs-6">{{ $adCategory->name }}</span>
                    <h1 class="fw-bold text-dark mb-3 display-6">{{ $ad->title }}</h1>
                    
                    <h2 class="text-price-yellow fw-bold display-5 mb-4">{{ number_format($ad->price, 0, ',', ' ') }} FCFA</h2>
                    
                    <div class="d-flex align-items-center gap-3 mb-4 p-3 bg-light rounded-3">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill text-muted me-2" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <span class="fw-bold text-dark">{{ $adLocation->ville }}</span>
                        </div>
                        <div class="vr"></div>
                        <div class="d-flex align-items-center">
                            <span class="text-muted me-2">État:</span>
                            <span class="fw-bold text-dark">
                                @if($ad->condition == 'New') Neuf
                                @elseif($ad->condition == 'Good') Bon état
                                @else Usagé @endif
                            </span>
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark mb-3">Description</h5>
                    <p class="text-muted" style="line-height: 1.8; white-space: pre-wrap;">{{ $ad->description }}</p>
                </div>

                <div class="mt-5 pt-4 border-top">
                    <!-- Call To Action -->
                    <div class="d-grid gap-2 d-md-flex">
                        <button class="btn btn-primary btn-lg px-5 fw-bold w-100">Contacter le vendeur</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
