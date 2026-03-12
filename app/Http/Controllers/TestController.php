<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class TestController extends Controller
{

    //private function __construct(){

    public function addUserInfo(Request $request){
         $user = new User;
        $user->login = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->phone_number = request('phone');
        $user->save();
        $categories = Category::all();
        $locations = Location::all();
         Auth::login($user);
        return view('freeads.ads', compact('categories', 'locations'));
    }

    public function login(){
       return view('freeads.ads');
    }
}
