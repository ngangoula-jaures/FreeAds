@php
use Illuminate\Support\Facades\Storage;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    @vite(['resources/css/app.css'])
    @vite(['resources/css/adminDashboard/all.min.css'])
    @vite(['resources/css/adminDashboard/framework.css'])
    @vite(['resources/css/adminDashboard/master.css'])
    @vite(['resources/css/adminDashboard/pages/Dashboard.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>
<body>
    @if(session('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
    <div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
        <h3 class="p-relative txt-c mt-0">Freeads</h3>
        <ul>
        <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('dashboard') }}">
            <i class="fa-regular fa-chart-bar fa-fw"></i>
            <span>Dashboard</span>
            </a>
        </li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('user.profile') }}">
            <i class="fa-regular fa-user fa-fw"></i>
            <span class="profile">Profile</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('user.annonces') }}">
            <i class="fa-solid fa-graduation-cap fa-fw"></i>
            <span>Annonces</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('home.page') }}">
            <span>Accueil</span>
            </a>
        </li>
        </ul>
    </div>
    <div class="content w-full">
        <!-- Start Head -->
        <div class="head bg-white p-15 between-flex">
        <div class="p-relative">
            <button class="p-10" placeholder="Rechercher" ></button>
        </div>
        <div class="icons d-flex align-center">
                    <span class="p-relative">
                        <form action="{{ route('logout') }}" method="POST">
                         @csrf
                    <button class='btn btn-primary'>Se deconnecter</button>
                    <form>
                    </span>
                </div>
        </div>
        <!-- End Head -->
        <h1 class="p-relative">Dashboard</h1>
        <div class="wrapper d-grid gap-20">
        <!-- Start Welcome Widget -->
        <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
            <div class="intro p-20 d-flex space-between bg-eee">
            <div>
                <h2 class="m-0">Welcome</h2>
                <p class="c-grey mt-5">{{ $user->login }}</p>
            </div>
            <img class="hide-mobile" src="{{Storage::url('images/avatar.jpeg')}}" alt="" />
            </div>
            <img src="{{Storage::url('images/avatar.jpeg')}}" alt="" class="avatar" />
            <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
            <div>{{ $user->login }}<span class="d-block c-grey fs-14 mt-10">{{ $user->role }}</span></div>
            <div>{{ $adsCount }}<span class="d-block c-grey fs-14 mt-10">Annonces</span></div>
            <div>205.000 FCFA<span class="d-block c-grey fs-14 mt-10">Gagné</span></div>
            </div>
            <a href="{{ route('user.profile') }}" class="visit d-block fs-14 bg-blue c-white w-fit btn-shape">Profile</a>
        </div>
        <!-- End Welcome Widget -->
        <!-- Start Ticket Widget -->
        <div class="tickets p-20 bg-white rad-10">
            <h2 class="mt-0 mb-10">Statistiques Globales</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Vos stats et progression</p>
            <div class="d-flex txt-c gap-20 f-wrap">
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-rectangle-list fa-2x mb-10 c-orange"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">{{ $adsCount }}</span>
                Annonces
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">2</span>
                En attente de confirmation
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-circle-check fa-2x mb-10 c-green"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">7</span>
                Ventes
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-rectangle-xmark fa-2x mb-10 c-red"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">3</span>
                Suppression
            </div>
            </div>
        </div>
        <!-- End Ticket Widget -->
        <!-- Start Social Media Stats Widget -->
        <div class="social-media p-20 bg-white rad-10 p-relative">
            <h2 class="mt-0 mb-25">Social Media Stats</h2>
            <div class="box twitter p-15 p-relative mb-10 between-flex">
            <i class="fa-brands fa-twitter fa-2x c-white h-full center-flex"></i>
            <span>90K Followers</span>
            <a class="fs-13 c-white btn-shape" href="#">Follow</a>
            </div>
            <div class="box facebook p-15 p-relative mb-10 between-flex">
            <i class="fa-brands fa-facebook-f fa-2x c-white h-full center-flex"></i>
            <span>2M Like</span>
            <a class="fs-13 c-white btn-shape" href="#">Like</a>
            </div>
            <div class="box youtube p-15 p-relative mb-10 between-flex">
            <i class="fa-brands fa-youtube fa-2x c-white h-full center-flex"></i>
            <span>1M Subs</span>
            <a class="fs-13 c-white btn-shape" href="#">Subscribe</a>
            </div>
            <div class="box linkedin p-15 p-relative mb-10 between-flex">
            <i class="fa-brands fa-linkedin fa-2x c-white h-full center-flex"></i>
            <span>70K Followers</span>
            <a class="fs-13 c-white btn-shape" href="#">Follow</a>
            </div>
        </div>
        <!-- Start End Media Stats Widget -->
        </div>
    </div>
    </div>
</body>
</html>


