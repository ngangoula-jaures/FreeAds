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
        //valider et Créer l'utilisateur maintenant! Plus besoin d'email car email dejà connu!
        $validated= $request->validate([
            'login'=>'required|string|max:255|unique:users,login',
            'token'=>'required|exists:tmpusers,token',
            'password'=>'required|min:4|confirmed',
            'phone_number'=>'required|digits:10|unique:users,phone_number',
        ]);
        //$validated['email']= $request->email; C'est mieux d'aller avec la verif du token puis prendre l'email
        //çà ajoute une couche de sécurité
        $remember= $request->has('remember'); //pour le cookie
        $tmpuser= TmpUser::where('token', $request->token)->firstOrFail();
        $validated['email']=$tmpuser->email;
        $user= User::create($validated);
        $tmpuser->delete();
        Auth::login($user, $remember);
        return redirect('/publication')->with('success', 'Inscription Reussie');
        
    }

    public function displaySignupPage($token){
        //On affiche ici la page d'inscription qui provient de la route('inscription/{token}')
        $verifToken= TmpUser::where('token', $token)->first();
            if($verifToken){
                return view('freeads.signup', compact('verifToken'));
            }else {
                return redirect()->route('index');
            }
    }

    public function displayLoginPage(){
        //Affichage de la page de connexion de la route('login')
        return view('freeads.login');
    }

    public function login(Request $request){
        //On verifie les infos entré par l'utilisateur pour la connexion
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $remember= $request->has('remember');
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended('/accueil');
        }
        return back()->withErrors([
            'email'=>'Identifiants incorrects'
        ])->onlyInput('email');
    }
}
