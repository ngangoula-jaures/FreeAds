<?php

use App\Http\Controllers\AdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/freeads',  [TestController::class, 'addUserInfo'])->name('freeads.addUserInfo');
Route::get('/freeads/login', [TestController::class, 'login']);

Route::get('/publication', [AdController::class, 'displayForm'])->name('publication.variables');

// on commence

Route::get('/publication', [AdController::class, 'displayForm'])->name('publication.variables');

Route::get("/inscription", function () {
    return view('freeads.signup');
})->name('signup');

Route::post('/publication', [AdController::class, 'publier'])->name('publication.publier');

Route::post("/inscription", [UserController::class, 'create'])->name('inscription');

Route::get('/index', function() {
    return url()->current();
})->name('index');

//Admin Principal Dashboard ou il peut faire du CRUD sur Categories et Users
Route::get("/admin", [AdminController::class, 'displayAdminPage'])->name('admin');
Route::post("/admin", [AdminController::class, 'adminActions'])->name('admin.actions');
//Pages Annonces chez L'Admin ou il Peut Supprimer des annonces presentes sur le site
Route::get('/admin/annonces', [AdminController::class, 'displayAnnoncesPage'])->name('admin.annonces');
Route::post('/admin/annonces', [AdminController::class, 'annoncesActions'])->name('admin.annoncesActions');
//Pages Profile Admin
Route::get('/admin/profile', [AdminController::class, 'displayProfilePage'])->name('admin.profile');

//User Principal Dashboard Pour le CRUD 
Route::get("/dashboard", [UserDashboardController::class, 'displayDashboardPage'])->name('dashboard');
//Pages Annonces chez L'Admin ou il Peut Supprimer des annonces presentes sur le site
Route::get('/dashboard/annonces', [UserDashboardController::class, 'displayAnnoncesPage'])->name('user.annonces');
Route::post('/dashboard/annonces', [UserDashboardController::class, 'annoncesActions'])->name('userAnnonces.Actions');
//Pages Profile Admin
Route::get('/dashboard/profile', [UserDashboardController::class, 'displayProfilePage'])->name('user.profile');







