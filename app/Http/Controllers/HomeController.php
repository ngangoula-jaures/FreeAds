<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ad;
use App\Models\AdPhoto;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    //private function __construct(){

    public function displayAds(){
         
        $ads= Ad::paginate(12, ['*'], 'ads');
        $photos=[];
        foreach($ads as $ad){
           $photos[$ad->id]= AdPhoto::where('ad_id', $ad->id)->first();
        }
        $categories= Category::all();
        $locations= Location::all();

        return view('freeads.home', compact('ads', 'photos', 'categories', 'locations'));
    }

    public function verifRole(){
        if(Auth::check()){
            $user= Auth::user();
            if($user->role === 'admin'){
                return redirect()->route('admin');
            }else{
                return redirect()->route('dashboard');
            }
        }
        
       return redirect('/accueil');
    }

    public function logout(Request $request){
         Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/accueil');
    }

}
