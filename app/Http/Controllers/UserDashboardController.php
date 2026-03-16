<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use App\Models\Ad;
use App\Models\AdPhoto;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function displayDashboardPage(){
        //Affichage du Daschboard Utilisateur
        $user=Auth::user();
        $adsCount= Ad::where('user_id', $user->id)->count();

        return view('freeads.dashboard', compact('user', 'adsCount'));
    }

    public function displayAnnoncesPage(){
        //On affiche ici uniquement les annonces de l'utilisateur
        $ads= Ad::where('user_id', Auth::id())->paginate(12, ['*'], 'annonces');
        if($ads->isEmpty()){
            $status="Vous n'avez aucune annonce publier!";
            return view('freeads.userAnnonces', compact('status'));
        }else{
            $photos=[];
            foreach($ads as $ad){
            $photos[$ad->id]= AdPhoto::where('ad_id', $ad->id)->first();
            }
        }
        return view('freeads.userAnnonces', compact('ads', 'photos'));
    }

    public function displayProfilePage(){
        //Affichage de la Page Profile du dashboard Utilisateur
        $user= Auth::user();
        $adsCount= Ad::where('user_id', $user->id)->count();
        return view('freeads.userProfile', compact('user', 'adsCount'));
    }

    public function displayAdsIdPage($id=null){
        //Ici c'est la page ou l'on affiche les infos d'une annonces! On recupere ces infos et ont les display
        //l'id en parametre c'est l'id de l'annonce
        $ad= Ad::find($id);
        $adPhotos= AdPhoto::where('ad_id', $id)->get();
        $adCategory= Category::where('id', $ad->category_id)->firstOrFail();
        $adLocation= Location::where('id', $ad->location_id)->firstOrFail();

        return view('freeads.product', compact('ad', 'adPhotos', 'adCategory', 'adLocation'));

    }

    public function userActions(Request $request){
       
    }
        //annonces User CRUD
    public function annoncesActions(Request $request){
        if($request->has('deleteAds')){
        //L'utilisateur Supprime sa Propre Annonces
            $id=$request->deleteAds;
            $annonces= Ad::findOrFail($id);
            $annonces->delete();
            return redirect('/dashboard/annonces');
        }else if($request->has('q')){
        //Recherche sur les annonces 
            $q=$request->q;
            $ads=Ad::where('title', 'REGEXP', "\\b$q\\b")->paginate(12, ['*'], 'annonces');
            $photos=[];
            foreach($ads as $ad){
                $photos[$ad->id]= AdPhoto::where('ad_id', $ad->id)->first();
            }
            return view('freeads.userAnnonces', compact('ads', 'photos'));

        }
    }
}
