<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    @vite(['resources/css/adminDashboard/all.min.css'])
    @vite(['resources/css/adminDashboard/framework.css'])
    @vite(['resources/css/adminDashboard/master.css'])
    @vite(['resources/css/adminDashboard/pages/Profile.css'])
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <title>Profile</title>
</head>
<body class="bg-ee">
    <div class="page d-flex">
        <div class="sidebar bg-white p-20 p-relative">
            <h3 class="p-relative txt-c mt-0">FreeAds</h3>
            <ul>
                <li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-chart-bar fa-fw"></i>
                        <span class="fs-14 hide-mobile">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('user.profile') }}">
                        <i class="fa-regular fa-user fa-fw"></i>
                        <span class="fs-14 hide-mobile">Profile</span>
                    </a>
                </li>
                    <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="{{ route('user.annonces') }}">
                        <i class="fa-solid fa-graduation-cap fa-fw"></i>
                        <span class="fs-14 hide-mobile">&nbsp&nbsp Mes Annonces</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content w-full ov-hidden">
            <!-- Start Head -->
            <div class="head bg-white p-15 between-flex">
                <div class="p-relative">
                    <button class="p-10" ></button>
                </div>
                <div class="icons d-flex align-center">
                    <span class="p-relative">
                    <button class='btn btn-primary'>Mot de Passe oublié ?</button>
                    <form action="{{ route('logout') }}" method="POST">
                         @csrf
                    <button class='btn btn-primary'>Se deconnecter</button>
                    </form>
                    </span>
                </div>
            </div>
            <!-- End Head -->
            <h1 class="p-relative">Profile</h1>
            <div class="profile-page m-20">
                <!-- Start OverView -->
                <div class="overview bg-white rad-10 d-flex align-center">
                    <div class="avatar-box txt-c p-20">
                        <img class="mb-10 rad-half" src="{{ Storage::url('images/avatar.jpeg') }}" alt="">
                        <h3 class="m-0">{{ $user->login }}</h3>
                        <p class="mt-10 c-grey">{{$user->role}}</p>
                        <div class="level rad-6 bg-eee p-relative">
                            <span style="width: 70%;"></span>
                        </div>
                        <div class="rating mt-10 mb-10">
                            <i class="fa-solid fa-star c-orange fs-13"></i>
                            <i class="fa-solid fa-star c-orange fs-13"></i>
                            <i class="fa-solid fa-star c-orange fs-13"></i>
                            <i class="fa-solid fa-star c-orange fs-13"></i>
                            <i class="fa-solid fa-star c-orange fs-13"></i>
                        </div>
                        <p class="c-grey fs-13"></p>
                    </div>
                    <div class="info-box w-full txt-c-mobile">
                        <!-- Start Information Row -->
                            <div class="box p-20 d-flex align-center">
                            <h4 class="c-grey fs-15 m-0 w-full">Informations Generales</h4>
                            <div class="fs-14">
                                <span class="c-grey">Nom Utilisateur:</span>
                                <span>{{ $user->login }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Gender:</span>
                                <span>Male</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Country:</span>
                                <span>Egypt</span>
                            </div>
                            </div>
                            <!-- End Information Row -->
                            <!-- Start Information Row -->
                            <div class="box p-20 d-flex align-center">
                            <h4 class="c-grey w-full fs-15 m-0">Informations Personnelles</h4>
                            <div class="fs-14">
                                <span class="c-grey">Email: </span>
                                <span>{{ $user->email }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Phone:</span>
                                <span>{{ $user->phone_number }}</span>
                            </div>
                            <div class="fs-14">
                                <span class="c-grey">Date Of Birth:</span>
                                <span>25/10/1982</span>
                            </div>
                            <div class="fs-14">
                                <label>
                                <input class="toggle-checkbox" type="checkbox" />
                                <div class="toggle-switch"></div>
                                </label>
                            </div>
                            </div>
                            <!-- End Information Row -->
                            <!-- Start Information Row -->
                            <div class="box p-20 d-flex align-center">
                            {{-- <h4 class="c-grey w-full fs-15 m-0">Info Annonces</h4> --}}
                            <div class="fs-14">
                                <span class="c-grey">Total Annonces:</span>
                                <span>{{ $adsCount }}</span>
                            </div>
                            </div>
                            <!-- End Information Row -->
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function enableEmail() {
            document.querySelector(".email").removeAttribute("disabled");
        }
    </script>
</body>
</html>

