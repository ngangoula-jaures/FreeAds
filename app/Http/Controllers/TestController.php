<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\User;

class TestController extends Controller
{

    //private function __construct(){

    public function addUserInfo(){
        // $user = new User;
        // $user->name = request('name');
        // $user->email = request('email');
        // $user->password = request('password');
        // $user->phone_number = request('phone');
        // $user->save();
        // //return view('freeads.test');
    }

    public function loginForm(){
       return view('freeads.test2');
    }
}
