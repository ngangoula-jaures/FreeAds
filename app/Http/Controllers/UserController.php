<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TmpUser;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request){
        $validated= $request->validate([
            'login'=>'required|string|max:255|unique:users,login',
            'token'=>'required|exists:tmpusers,token',
            // 'email'=>'required|email|unique:users,email',
            'password'=>'required|min:4|confirmed',
            'phone_number'=>'required|digits:10|unique:users,phone_number',
        ]);
        //$validated['email']= $request->email; mieux d'aller avec la verif du token puis prendre l'email
        $tmpuser= TmpUser::where('token', $request->token)->firstOrFail();
        $validated['email']=$tmpuser->email;
        $user= User::create($validated);
        $tmpuser->delete();
        Auth::login($user);
        //return view('freeads.ads', $user, compact('categories', 'locations'));
        return redirect('/publication')->with('success', 'Inscription Reussie');
        //redirect()->route('user', ['id' => 1])
    }

    public function displaySignupPage($token){

        $verifToken= TmpUser::where('token', $token)->first();
        //dd($verifToken);
            if($verifToken){
                return view('freeads.signup', compact('verifToken'));
            }else {
                return redirect()->route('index');
            }
    }
}
