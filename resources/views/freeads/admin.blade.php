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
    <link href="https://cdn.jsdelivr.net" rel="stylesheet">
</head>
<body>
    @if(session('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
    <div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
        <h3 class="p-relative txt-c mt-0">Mr.M</h3>
        <ul>
        <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('admin') }}">
            <i class="fa-regular fa-chart-bar fa-fw"></i>
            <span>Dashboard</span>
            </a>
        </li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('admin.profile') }}">
            <i class="fa-regular fa-user fa-fw"></i>
            <span class="profile">Profile</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('admin.annonces') }}">
            <i class="fa-solid fa-graduation-cap fa-fw"></i>
            <span>Annonces</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('home.page')}}">
            <span>Accueil</span>
            </a>
        </li>
        </ul>
    </div>
    <div class="content w-full">
        <!-- Start Head -->
        <div class="head bg-white p-15 between-flex">
        <div class="search p-relative">
            <form action="{{ route('admin.actions') }}" method="POST" class="deleteform">
                @csrf
            <input class="p-10" type="search" name='q' placeholder="Rechercher" />
            </form>
        </div>
        <div class="icons d-flex align-center">
                    <span class="p-relative">
                    <form action="{{ route('logout') }}" method="POST">
                         @csrf
                    <button class='btn btn-primary'>Se deconnecter</button>
                    </form>
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
            <img class="hide-mobile" src="{{Storage::url($user->avatar)}}" alt="" />
            </div>
            <img src="{{Storage::url($user->avatar)}}" alt="" class="avatar" />
            <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
            <div>{{ $user->login }}<span class="d-block c-grey fs-14 mt-10">{{ $user->role }}</span></div>
            <div>{{ $adsCount }} <span class="d-block c-grey fs-14 mt-10">Annonces</span></div>
            <div>115.000 FCFA<span class="d-block c-grey fs-14 mt-10">Gagner</span></div>
            </div>
            <a href="profile.html" class="visit d-block fs-14 bg-blue c-white w-fit btn-shape">Profile</a>
        </div>
        <!-- End Welcome Widget -->
        <!-- Start Ticket Widget -->
        <div class="tickets p-20 bg-white rad-10">
            <h2 class="mt-0 mb-10">Statistiques Globales</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Les Stats de Freeads et progression</p>
            <div class="d-flex txt-c gap-20 f-wrap">
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-rectangle-list fa-2x mb-10 c-orange"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">205 000</span>
                Annonces
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">12 000</span>
                En attente de confirmation
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-circle-check fa-2x mb-10 c-green"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">52 000</span>
                Ventes
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-rectangle-xmark fa-2x mb-10 c-red"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">9000</span>
                Suppression
            </div>
            </div>
        </div>
        <!-- End Ticket Widget -->
        <!-- Start Latest News Widget -->
        <div class="latest-news p-20 bg-white rad-10 txt-c-mobile">
            <h2 class="mt-0 mb-20"><b>Categories</b></h2>
             <form action="{{ route('admin.actions') }}" method="POST">
                @csrf
            @foreach($categories as $category)
            <div class="news-row d-flex align-center">
            <img src="{{ Storage::url('images/DPwZSToBD3Jv2ipLOSnvobTKdgrGEPZ6hRVZdpaR.jpg') }}" alt="" />
            <div class="info">
                <h3><input type='text' name="categories[{{ $category->id }}][name]" value='{{ $category->name}}'></input></h3>
            </div>
            
            <div class="btn-shape bg-eee fs-13 label">
                <button type="submit" name='deleteCategory' value="{{ $category->id }}" class='btn btn-primary'>Supprimer</button>
            </div>
            </div>
            @endforeach
            @if(isset($ajouter))
               <div class="news-row d-flex align-center">
            <img src="{{ Storage::url('images/UVRR4STTl5OTIXTHONVyqM3BaJhlvfxyJAXDp5K9.jpg') }}" alt="" />
            <div class="info">
                <h3><input type='text' name="categories[id][name]" value='' placeholder='Mettez la categorie'></input></h3>
            </div>
            
            <div class="btn-shape bg-eee fs-13 label">
                <button type="submit" name='deleteCategory' value="" class='btn btn-primary'>Supprimer</button>
            </div>
            </div>
            @endif
            @php
                unset($ajouter)
            @endphp

            <div class="pagination-links">
                {{ $categories->links('pagination::bootstrap-5') }}
            </div><br>
            <button type="submit" name='modifyCategory' class='btn btn-primary'>Enregistrer les Modifs</button>
            <button type="submit" name='ajouterCategory' class='btn btn-primary'>+</button>
            </form>
            
        </div>
        <!-- End Latest News Widget -->
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
        <!-- Start Projects Table -->
        <div class="projects p-20 bg-white rad-10 m-20">
        <h2 class="mt-0 mb-20"><b>Utilisateurs</b></h2>
        <div class="responsive-table">
            <form action="{{ route('admin.actions') }}" method="POST" class="deleteform">
                @csrf
            <table class="fs-15 w-full">
            <thead>
                <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>role</td>
                <td>Date</td>
                <td>Actions </td>
                </tr>
            </thead>
            
            <tbody>
                @foreach($users as $user)
                <tr>
                    <input type='hidden' name="users[{{ $user->id }}][id]" value="{{ $user->id }}">
                    <td>
                        <input type='text' name="users[{{ $user->id }}][login]" value="{{ $user->login }}">
                    </td>
                    <td>
                        <input type='email' name="users[{{ $user->id }}][email]" value="{{ $user->email }}">
                    </td>
                    <td>
                        <input type='tel' name="users[{{ $user->id }}][phone_number]" value="{{ $user->phone_number }}">
                    </td>
                    <td>
                        <input type='text' name="users[{{ $user->id }}][role]" value="{{ $user->role }}">
                    </td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <button type="submit" name='deleteUser' value="{{ $user->id }}" class='btn btn-primary'>Supprimer</button>
                    </td>
                </tr>
                @endforeach
            </tbody> 
            </table>
       </div>
       <div class="mt-3">
       <button type="submit" name="modifyUser" class="btn btn-success w-full">
                Enregistrer toutes les modifications
            </button>
        </div>
        </form>
         <div class="pagination-links">
                {{ $users->links() }}
            </div>
        </div>
        <!-- End Projects Table -->
    </div>
    </div>
</body>
</html>

