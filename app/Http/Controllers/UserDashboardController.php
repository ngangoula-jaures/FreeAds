<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Ad;
use App\Models\AdPhoto;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserDashboardController extends Controller
{
    public function displayDashboardPage(){
        $user=User::find(21);//Utiliser AuthId plus tard
        $adsCount= Ad::where('user_id', 21)->count();//Utiliser AuthId plus tard

        return view('freeads.dashboard', compact('user', 'adsCount'));
    }

    public function displayAnnoncesPage(){
        $ads= Ad::paginate(12, ['*'], 'annonces');
        $photos=[];
        foreach($ads as $ad){
           $photos[$ad->id]= AdPhoto::where('ad_id', $ad->id)->first();
        }
        return view('freeads.userAnnonces', compact('ads', 'photos'));
    }

    public function displayProfilePage(){
        //Trouver le User avec son Id via Auth::id();
        $user= User::find('21');
        $adsCount= Ad::where('user_id', 21)->count();
        return view('freeads.userProfile', compact('user', 'adsCount'));
    }

    public function userActions(Request $request){
       
    }
        //annonces Admin CRUD
    public function annoncesActions(Request $request){
        if($request->has('deleteAds')){

            $id=$request->deleteAds;
            $annonces= Ad::findOrFail($id);
            $annonces->delete();
            return redirect('/admin/annonces');
        }else if($request->has('q')){
            $q=$request->q;
            $ads=Ad::where('title', 'REGEXP', "\\b$q\\b")->paginate(12, ['*'], 'annonces');
            $photos=[];
            foreach($ads as $ad){
                $photos[$ad->id]= AdPhoto::where('ad_id', $ad->id)->first();
            }
            return view('freeads.adminAnnonces', compact('ads', 'photos'));

        }
    }
}
