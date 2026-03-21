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

    public function displayAds(Request $request){
         
        $query = Ad::query();

        if ($request->filled('q')) {
            $query->where(function($qBuilder) use ($request) {
                $qBuilder->where('title', 'like', '%' . $request->q . '%')
                         ->orWhere('description', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('location_id')) {
            $query->where('location_id', $request->location_id);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $ads = $query->orderBy('created_at', 'desc')->paginate(12, ['*'], 'ads')->appends($request->all());
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
        
       return redirect('/');
    }

    public function logout(Request $request){
         Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }

}
