<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Main Style sheets -->
    @vite(['resources/css/app.css'])
    @vite(['resources/css/adminDashboard/all.min.css'])
    @vite(['resources/css/adminDashboard/framework.css'])
    @vite(['resources/css/adminDashboard/master.css'])
    @vite(['resources/css/adminDashboard/pages/Annonces.css'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Courses</title>
</head>
<body class="bg-ee">
    <div class="page d-flex">
        <div class="sidebar bg-white p-20 p-relative">
            <h3 class="p-relative txt-c mt-0">FreeAds</h3>
            <ul>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('admin') }}">
                        <i class="fa-solid fa-chart-bar fa-fw"></i>
                        <span class="fs-14 hide-mobile">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('admin.profile') }}">
                        <i class="fa-regular fa-user fa-fw"></i>
                        <span class="fs-14 hide-mobile">Profile</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('admin.annonces') }}">
                        <i class="fa-solid fa-graduation-cap fa-fw"></i>
                        <span class="fs-14 hide-mobile">Annonces</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content w-full ov-hidden">
            <!-- Start Head -->
            <div class="head bg-white p-15 between-flex">
                <div class="search p-relative">
                    <form action="{{ route('admin.annoncesActions') }}" method="POST">
                        @csrf
                    <input class="p-10" type="search" name='q' placeholder="Rechercher" />
                    </form>
                </div>
                <div class="icons d-flex align-center">
                    <span class="p-relative">
                    <button class='btn btn-primary'>Se deconnecter</button>
                    </span>
                </div>
            </div>
            <h1 class="p-relative"><b>Annonces</b></h1>
            <!-- End Head -->
            <!-- Start Courses Page -->

            <div class="courses-page d-grid m-20 gap-20">
                @foreach($ads as $ad)
                <div class="bg-white p-relative rad-6 course">
                    <img class="cover" src="{{ Storage::url($photos[$ad->id]['path']) }}" alt="" />
                    {{--<img class="instructor" src="imgs/team-01.png" alt="" />--}}
                    <div class="p-20">
                        <h4 class="m-0">{{ $ad->title}}</h4>
                        <p class="desc c-grey mt-15 fs-14"></p>
                    </div>
                     <form action="{{ route('admin.annoncesActions') }}" method="POST">
                            @csrf
                    <div class="info p-15 p-relative between-flex">
                        <span class="title bg-blue c-white btn-shape p-absolute"><button type='submit' name='deleteAds' value="{{ $ad->id }}">Supprimer</button></span>
                        <span class="c-grey">
                            <i class="fa-solid fa-user"></i>
                            {{ $ad->condition }} 
                        </span>
                        <span class="c-grey">
                            {{ $ad->price }} FCFA
                        </span>
                    </div>
                    </form>
                </div>
                @endforeach 

            </div>
            <!-- End Courses Page -->
        </div>
        <div class="pagination-links">
            {{ $ads->links() }}
        </div>
    </div>
</body>
</html>