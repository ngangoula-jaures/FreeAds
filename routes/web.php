<?php

use App\Http\Controllers\AdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/inscription", function () {
    return view('freeads.signup');
});

// Route::get('/freeads', function () {
//     return view('freeads.test');
// });

Route::post('/freeads',  [TestController::class, 'addUserInfo'])->name('freeads.addUserInfo');
//Route::get('/freeads/login', [TestController::class, 'loginForm']);

Route::get('/publication', [AdController::class, 'displayForm'])->name('publication.variables');
// Route::get("/publication", function () {
//     return view('freeads.ads');
// })->name('publication.variables');
//Route::post('/publication', [])

// on commence

Route::get('/publication', [AdController::class, 'displayForm'])->name('publication.variables');

Route::get("/inscription", function () {
    return view('freeads.signup');
})->name('signup');

Route::post('/publication', [AdController::class, 'publier'])->name('publication.publier');

Route::post("/inscription", [UserController::class, 'create'])->name('inscription');

Route::get('/index', function() {
    return 'Page Principale';
})->name('index');







