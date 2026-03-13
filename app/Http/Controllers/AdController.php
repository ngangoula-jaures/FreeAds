<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdPhoto;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdController extends Controller
{
    public function displayForm(){
        $categories = Category::all();
        $locations = Location::all();
        //$user= new User();
        //Auth::login($user);
        return view('freeads.ads', compact('categories', 'locations'));
    }

    public function publier(Request $request){
        $validated= $request->validate([
            'title'=>'required|string|max:255',
            'category_id'=>'required',
            'price'=>'required|numeric',
            'location_id'=>'required',
            'condition'=>'required',
            'description'=>'required|string|min:10|max:5000',
        ]);

        $validate= $request->validate([
            'photo'=>'required|array|min:1|max:5',
            'photo.*'=>'image|mimes:jpg,png,jpeg|max:2048',
        ], [
            'photo.max'=>'Uploadez 5 images maximum',
            'photo.*.image'=>'Format jpg, png et jpeg autorisé!',
            'photo.*.max'=>"Taille autorisé : 2mo",
        ]);

            $validated['user_id']= Auth::id();
            $ad= Ad::create($validated);

            if($request->hasFile('photo')){
                $files= $request->file('photo');
                foreach($files as $file){
                    $path=$file->store('images', 'public');
                    AdPhoto::create([
                        'path'=>$path,
                        'ad_id'=>$ad->id
                    ]);
                }
            }
            $user= new User;
            Auth::login($user);
            //$request->session()->forget('_old_input'); 
            return redirect('/index')->with('success', 'Votre Article à été Publié avec Succès');
    }
}
