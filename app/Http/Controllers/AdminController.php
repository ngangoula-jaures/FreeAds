<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Ad;
use App\Models\AdPhoto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function displayAdminPage(){
        $users= User::paginate(7, ['*'], 'users');
        $user=User::find(21);//Utiliser AuthId plus tard
        $adsCount= Ad::where('user_id', 21)->count();//Utiliser AuthId plus tard
        $categories= Category::paginate(4, ['*'], 'categories');
        //$pages= $category->links();

        return view('freeads.admin', compact('users', 'categories', 'user', 'adsCount'));
    }

    public function displayAnnoncesPage(){
        $ads= Ad::paginate(12, ['*'], 'annonces');
        $photos=[];
        foreach($ads as $ad){
           $photos[$ad->id]= AdPhoto::where('ad_id', $ad->id)->first();
        }
        return view('freeads.adminAnnonces', compact('ads', 'photos'));
    }

    public function displayProfilePage(){
        //Trouver le User avec son Id via Auth::id();
        $user= User::find('21');
        $adsCount= Ad::where('user_id', 21)->count();
        return view('freeads.adminProfile', compact('user', 'adsCount'));
    }

    public function adminActions(Request $request){
        if($request->has('deleteUser')){
            $id=$request->deleteUser;
            $user=User::findOrFail($id);
            $user->delete();
            //User::where('id', $id)->deleteOrFail();
        
        return redirect('/admin');
        } else if ($request->has('modifyUser')){
            //Possible de faire avec un tableau de $rules et aussi avec un foreach separé en inserant les données
            //exactement comme elles sont enregistré dans $request->users : [1=>['login'=>"", email=>"", etc...],
            // le but ici c'est juste de verifier les doublons               2=>['login'=>'', 'email'=>"", etc...] ]
                $Users=$request->users;
                foreach($Users as $id=>$user){
                    $validated= Validator::make($user, [
                    'login'=>['required', 'string', 'max:255', Rule::unique('users', 'login')->ignore($id)],
                    'email'=>['required', 'email', Rule::unique('users', 'email')->ignore($id)],
                    'phone_number'=>['required', 'digits:10', Rule::unique('users', 'phone_number')->ignore($id)],
                    'role'=>'in:admin,user'
                ])->validate();

                    User::where('id', $id)->update([
                        'login'=>$validated['login'], 
                        'email'=>$validated['email'],
                        'phone_number'=>$validated['phone_number'], 
                        'role'=>$validated['role']
                        ]);
                }

                return redirect('/admin')->with('success', "Vos modification en été enregistré!!!");

        }else if($request->has('deleteCategory')){
                $id=$request->deleteCategory;
                $category=Category::findOrFail($id);
                $category->delete();

                return redirect('/admin')->with('success', "Vos modification en été enregistré!!!");
        } else if($request->has('modifyCategory')){

            $categories=$request->categories;
                foreach($categories as $id=>$category){
                    $validated= Validator::make($category, [
                    'name'=>['required', 'string', 'max:255', Rule::unique('categories', 'name')->ignore($id)],
                ])->validate();
                    $item= Category::find($id);
                    if($item){
                        Category::where('id', $id)->update([
                        'name'=>$validated['name'], 
                        'slug'=>str($validated['name'])->slug(),
                        ]);
                    }else{
                        Category::create([
                        'name'=>$validated['name'], 
                        'slug'=>str($validated['name'])->slug(),
                        ]);
                    }
                    
                }

                return redirect('/index')->with('success', "Vos modification en été enregistré!!!");
        }else if($request->has('ajouterCategory')){

            $users= User::paginate(7, ['*'], 'users');
            $categories= Category::paginate(4, ['*'], 'categories');
            $ajouter='';
            return view('freeads.admin', compact('users', 'categories', 'ajouter'));
        }else if($request->has('q')){
            $input=$request->q;
            $users=User::where('login', 'LIKE', "%$input%")
            ->orWhere('email', 'LIKE', "%$input%")
            ->orWhere('phone_number', 'LIKE', "%$input%")->paginate(7, ['*'], 'users');
            $categories= Category::paginate(4, ['*'], 'categories');

            return view('freeads.admin', compact('users', 'categories'));
        }

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