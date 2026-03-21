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
    //J'utilise ici une Table Temporaire tmpusers pour les verifs des emails avant remplissage des infos
    public function create( Request $request){
        //on cree l'utilisateur temporaire avec son mail et un token unique generé
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
        //on donne à l'url la route vers la page unique associé à l'utilsateur pour le remplissage des ces infos
        //et l'enregistrement dans la vraie base users!
        $url= route('signup', ['token'=>$token]);

        Mail::to($validated['email'])->send(new VerifyRegistrationMail($url));

        return back()->with('status', 'Vous avez un mail de verification de Freeads!');
    }

    public function displaySignupPage($token){
        //Ici on affiche la page d'inscription mais on reverifie la validité du token
        //au cas ou il aurait expiré! 24h
        $verifToken= TmpUser::where('token', $token)->firstOrFail();

        if($verifToken->created_at < now()->subMinutes(1)){
            $verifToken->delete();
            return redirect()->route('index');
        }else{
            
            return redirect()->route('signup', ['token'=>$verifToken]);
        
        }
        
    }
}
