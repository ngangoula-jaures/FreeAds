<?php

namespace App\Http\Controllers;

use App\Models\TmpUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyRegistrationMail;

class TmpUserController extends Controller
{
    public function create( Request $request){
    
        $validated= $request->validate([
            'email'=>'required|email|unique:users,email',
        ], [
            'email.unique'=>'Cette Email est déjà Pris!',
        ]);

        $token= Str::random(20);

        $tmpuser= TmpUser::updateOrCreate([
            'email'=>$validated['email'],
            'token'=>$token
        ]);

        $url= route('freeads.signup', ['token'=>$token]);


    }
}
