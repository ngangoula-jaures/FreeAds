<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request){
        $validated= $request->validate([
            'login'=>'required|string|max:255|unique:users,login',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|confirmed',
            'phone_number'=>'required|digits:10|unique:users,phone_number',
        ]);

        

        $user= User::create($validated);
        // $categories = Category::all();
        // $locations = Location::all();
        Auth::login($user);

        //return view('freeads.ads', $user, compact('categories', 'locations'));
        return redirect('/publication')->with('success', 'Inscription Reussie');
        //redirect()->route('user', ['id' => 1])
    }
}
