<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\TmpUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\URL;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::post('/freeads',  [TestController::class, 'addUserInfo'])->name('freeads.addUserInfo');
// Route::get('/freeads/login', [TestController::class, 'login']);

//Route::get('/publication', [AdController::class, 'displayForm'])->name('publication.variables');

// on commence

Route::get('/', [HomeController::class, 'displayAds'])->name('home.page');
Route::get('/accueil', [HomeController::class, 'displayAds'])->name('home.page');
Route::get('/redirection', [HomeController::class, 'verifRole'])->name('redirection.dashboard');

//inscription avec coordonnées maintenant
Route::get("/inscription/{token}", [UserController::class, 'displaySignupPage'])->name('signup');
Route::post("/inscription-token", [UserController::class, 'create'])->name('inscription');

//Connexion Utilisateur
Route::get('/connexion', [UserController::class, 'displayLoginPage'])->name('login');
Route::post('/connexion', [UserController::class, 'login'])->name('connexion');

//page de publication d'annonces
Route::get('/publication', [AdController::class, 'displayForm'])->name('publication.variables')->middleware('auth');
Route::post('/publication', [AdController::class, 'publier'])->name('publication.publier');

//Page D'accueil
Route::get('/index', function() {
    return 'lien expiré';
})->name('index');
//Fin Page D'accueil

//Admin Principal Dashboard ou il peut faire du CRUD sur Categories et Users
Route::get("/admin", [AdminController::class, 'displayAdminPage'])->name('admin')->middleware(['auth', 'admin']);
Route::post("/admin", [AdminController::class, 'adminActions'])->name('admin.actions');
//Pages Annonces chez L'Admin ou il Peut Supprimer des annonces presentes sur le site
Route::get('/admin/annonces', [AdminController::class, 'displayAnnoncesPage'])->name('admin.annonces')->middleware(['auth', 'admin']);
Route::post('/admin/annonces', [AdminController::class, 'annoncesActions'])->name('admin.annoncesActions');
//Pages Profile Admin
Route::get('/admin/profile', [AdminController::class, 'displayProfilePage'])->name('admin.profile')->middleware(['auth', 'admin']);
Route::patch('/admin/profile', [AdminController::class, 'modifyAvatar'])->name('admin.avatar');
//fin  Admin Dashboard

//User Principal Dashboard Pour le CRUD 
Route::get("/dashboard", [UserDashboardController::class, 'displayDashboardPage'])->name('dashboard')->middleware('auth');
//Pages Annonces pour le User ou il Peut Supprimer des annonces presentes sur le site
Route::get('/dashboard/annonces', [UserDashboardController::class, 'displayAnnoncesPage'])->name('user.annonces')->middleware('auth');
Route::post('/dashboard/annonces', [UserDashboardController::class, 'annoncesActions'])->name('userAnnonces.Actions');
//Pages Profile User
Route::get('/dashboard/profile', [UserDashboardController::class, 'displayProfilePage'])->name('user.profile')->middleware('auth');
//Fin Dashboard User

//Page Produits
Route::get('/annonces/{id?}', [UserDashboardController::class, 'displayAdsIdPage'])->name('annonces.id')->middleware('auth');
//Fin Page Produits

//Route pour les Temporary Users
Route::get('/inscription', function(){
    return view('freeads.test');
});
Route::post('/inscription', [TmpUserController::class, 'create'])->name('test');
//Fin TTemporary Users

Route::post('/deconnection', [HomeController::class, 'logout'])->name('logout');








