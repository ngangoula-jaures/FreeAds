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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com" />
    @vite(['resources/css/app.css'])
    @vite(['resources/css/adminDashboard/all.min.css'])
    @vite(['resources/css/adminDashboard/framework.css'])
    @vite(['resources/css/adminDashboard/master.css'])
    @vite(['resources/css/adminDashboard/pages/Dashboard.css'])
    {{-- <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/framework.css" />
    <link rel="stylesheet" href="css/master.css" />
    <link rel="stylesheet" href="css/pages/Dashboard.css" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>
<body>
    @if(session('success')){
        <div>
            {{session('success')}}
        </div>
    }  
    @endif
    <div class="page d-flex">
    <div class="sidebar bg-white p-20 p-relative">
        <h3 class="p-relative txt-c mt-0">Mr.M</h3>
        <ul>
        <li>
            <a class="active d-flex align-center fs-14 c-black rad-6 p-10" href="index.html">
            <i class="fa-regular fa-chart-bar fa-fw"></i>
            <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="settings.html">
            <i class="fa-solid fa-gear fa-fw"></i>
            <span>Settings</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="profile.html">
            <i class="fa-regular fa-user fa-fw"></i>
            <span>Profile</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="projects.html">
            <i class="fa-solid fa-diagram-project fa-fw"></i>
            <span>Projects</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="courses.html">
            <i class="fa-solid fa-graduation-cap fa-fw"></i>
            <span>Courses</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="friends.html">
            <i class="fa-regular fa-circle-user fa-fw"></i>
            <span>Friends</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="files.html">
            <i class="fa-regular fa-file fa-fw"></i>
            <span>Files</span>
            </a>
        </li>
        <li>
            <a class="d-flex align-center fs-14 c-black rad-6 p-10" href="plans.html">
            <i class="fa-regular fa-credit-card fa-fw"></i>
            <span>Plans</span>
            </a>
        </li>
        </ul>
    </div>
    <div class="content w-full">
        <!-- Start Head -->
        <div class="head bg-white p-15 between-flex">
        <div class="search p-relative">
            <input class="p-10" type="search" placeholder="Type A Keyword" />
        </div>
        <div class="icons d-flex align-center">
            <span class="notification p-relative">
            <i class="fa-regular fa-bell fa-lg"></i>
            </span>
            <img src="{{ Storage::url('images/DPwZSToBD3Jv2ipLOSnvobTKdgrGEPZ6hRVZdpaR.jpg') }}" alt="img" />
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
                <p class="c-grey mt-5">Mahmoud</p>
            </div>
            <img class="hide-mobile" src="{{Storage::url('images/DPwZSToBD3Jv2ipLOSnvobTKdgrGEPZ6hRVZdpaR.jpg')}}" alt="" />
            </div>
            <img src="{{Storage::url('images/DPwZSToBD3Jv2ipLOSnvobTKdgrGEPZ6hRVZdpaR.jpg')}}" alt="" class="avatar" />
            <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
            <div>Mahmoud Samy <span class="d-block c-grey fs-14 mt-10">Developer</span></div>
            <div>80 <span class="d-block c-grey fs-14 mt-10">Projects</span></div>
            <div>$8500 <span class="d-block c-grey fs-14 mt-10">Earned</span></div>
            </div>
            <a href="profile.html" class="visit d-block fs-14 bg-blue c-white w-fit btn-shape">Profile</a>
        </div>
        <!-- End Welcome Widget -->
        <!-- Start Quick Draft Widget -->
        
        <!-- End Quick Draft Widget -->
        <!-- Start Ticket Widget -->
        <div class="tickets p-20 bg-white rad-10">
            <h2 class="mt-0 mb-10">Tickets Statistics</h2>
            <p class="mt-0 mb-20 c-grey fs-15">Everything About Support Tickets</p>
            <div class="d-flex txt-c gap-20 f-wrap">
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-rectangle-list fa-2x mb-10 c-orange"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">2500</span>
                Total
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-solid fa-spinner fa-2x mb-10 c-blue"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">500</span>
                Pending
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-circle-check fa-2x mb-10 c-green"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">1900</span>
                Closed
            </div>
            <div class="box p-20 rad-10 fs-13 c-grey">
                <i class="fa-regular fa-rectangle-xmark fa-2x mb-10 c-red"></i>
                <span class="d-block c-black fw-bold fs-25 mb-5">100</span>
                Deleted
            </div>
            </div>
        </div>
        <!-- End Ticket Widget -->
        <!-- Start Latest News Widget -->
        <div class="latest-news p-20 bg-white rad-10 txt-c-mobile">
            <h2 class="mt-0 mb-20">Latest News</h2>
            <div class="news-row d-flex align-center">
            <img src="imgs/news-01.png" alt="" />
            <div class="info">
                <h3>Created SASS Section</h3>
                <p class="m-0 fs-14 c-grey">New SASS Examples & Tutorials</p>
            </div>
            <div class="btn-shape bg-eee fs-13 label">3 Days Ago</div>
            </div>
            <div class="news-row d-flex align-center">
            <img src="imgs/news-02.png" alt="" />
            <div class="info">
                <h3>Changed The Design</h3>
                <p class="m-0 fs-14 c-grey">A Brand New Website Design</p>
            </div>
            <div class="btn-shape bg-eee fs-13 label">5 Days Ago</div>
            </div>
            <div class="news-row d-flex align-center">
            <img src="imgs/news-03.png" alt="" />
            <div class="info">
                <h3>Team Increased</h3>
                <p class="m-0 fs-14 c-grey">3 Developers Joined The Team</p>
            </div>
            <div class="btn-shape bg-eee fs-13 label">7 Days Ago</div>
            </div>
            <div class="news-row d-flex align-center">
            <img src="imgs/news-04.png" alt="" />
            <div class="info">
                <h3>Added Payment Gateway</h3>
                <p class="m-0 fs-14 c-grey">Many New Payment Gateways Added</p>
            </div>
            <div class="btn-shape bg-eee fs-13 label">9 Days Ago</div>
            </div>
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
        <h2 class="mt-0 mb-20">Projects</h2>
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

