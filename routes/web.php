<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\TmpUserController;
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

//Route::get('/publication', [AdController::class, 'displayForm'])->name('publication.variables');

// on commence


//inscription avec coordonnées maintenant
Route::get("/inscription/{token}", [UserController::class, 'displaySignupPage'])->name('signup');
Route::post("/inscription", [UserController::class, 'create'])->name('inscription');
//page de publication d'annonces
Route::get('/publication', [AdController::class, 'displayForm'])->name('publication.variables');
Route::post('/publication', [AdController::class, 'publier'])->name('publication.publier');



Route::get('/index', function() {
    return 'lien expiré';
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
//Pages Annonces pour le User ou il Peut Supprimer des annonces presentes sur le site
Route::get('/dashboard/annonces', [UserDashboardController::class, 'displayAnnoncesPage'])->name('user.annonces');
Route::post('/dashboard/annonces', [UserDashboardController::class, 'annoncesActions'])->name('userAnnonces.Actions');
//Pages Profile User
Route::get('/dashboard/profile', [UserDashboardController::class, 'displayProfilePage'])->name('user.profile');

//Page produits
Route::get('/annonces/{id?}', [UserDashboardController::class, 'displayAdsIdPage'])->name('annonces.id');

//Route pour les Temporary Users
Route::get('freeads/inscription/{token}', [TmpUserController::class, 'displaySignupPage'])->name('freeads.signup');

Route::get('/test', function(){
    return view('freeads.test');
});
Route::post('/test', [TmpUserController::class, 'create'])->name('test');







