<?php

namespace App\Http\Controllers;

use App\Models\TmpUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyRegistrationMail;
use Carbon\Carbon;

class TmpUserController extends Controller
{
    public function create( Request $request){
    
        $validated= $request->validate([
            'email'=>'required|email|unique:users,email',
        ], [
            'email.unique'=>'Cette Email est déjà Pris!',
        ]);

        $token= Str::random(20);

        TmpUser::updateOrCreate(
            ['email' => $validated['email']],
            ['token' => $token, 'created_at'=> Carbon::now()]
        );

        $url= route('signup', ['token'=>$token]);

        Mail::to($validated['email'])->send(new VerifyRegistrationMail($url));

        return back()->with('status', 'Vous avez un mail de verification de Freeads!');
    }

    public function displaySignupPage($token){

        $verifToken= TmpUser::where('token', $token)->firstOrFail();

        if($verifToken->created_at < now()->subMinutes(2)){
            $verifToken->delete();
            return redirect()->route('index');
        }else{
            
            return redirect()->route('signup', ['token'=>$verifToken]);// j'ai passé le verifToken en parametre 
        //pour l"envoyer en post en hidden lors de l'inscription de l'utilisateur
        }
        
    }
}
