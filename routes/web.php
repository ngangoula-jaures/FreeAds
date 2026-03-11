<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/freeads', function () {
    return view('freeads.test');
});

Route::post('/freeads',  [TestController::class, 'addUserInfo']);
//Route::get('/freeads/login', [TestController::class, 'loginForm']);




