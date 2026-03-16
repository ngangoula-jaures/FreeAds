<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Ad;
use App\Models\AdPhoto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function displayAdminPage(){
        //Afficher Dashboard Admin
        $users= User::paginate(7, ['*'], 'users');
        $user=Auth::user();
        $adsCount= Ad::where('user_id', $user->id)->count();
        $categories= Category::paginate(4, ['*'], 'categories');

        return view('freeads.admin', compact('users', 'categories', 'user', 'adsCount'));
    }

    public function displayAnnoncesPage(){
        //Pour afficher les annonces et exactement une image associé a cette annonce
        $ads= Ad::paginate(12, ['*'], 'annonces');
        $photos=[];
        foreach($ads as $ad){
           $photos[$ad->id]= AdPhoto::where('ad_id', $ad->id)->first();
        }
        return view('freeads.adminAnnonces', compact('ads', 'photos'));
    }

    public function displayProfilePage(){
        //Pour Afficher les infos de l'admin et le nombres d'annonces qu'il a posté
        $user= Auth::user();
        $adsCount= Ad::where('user_id', $user->id)->count();
        return view('freeads.adminProfile', compact('user', 'adsCount'));
    }

    public function adminActions(Request $request){
        if($request->has('deleteUser')){
            //Pour supprimer un utilisateur
            $id=$request->deleteUser;
            $user=User::findOrFail($id);
            $user->delete();
            //User::where('id', $id)->deleteOrFail();
        
            return redirect('/admin');
        } else if ($request->has('modifyUser')){
            //On enregistre toutes les modifs effectué par l'admin en une seule fois!
            //Possible de faire avec un tableau de $rules et aussi avec un foreach separé en inserant les données
            //exactement comme elles sont enregistré dans $request->users : [1=>['login'=>"", email=>"", etc...],
            // le but ici c'est juste de verifier les doublons               2=>['login'=>'', 'email'=>"", etc...] ]
            //Car un Utilisateur a un seul et unique login, email et numero
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
                //Supprimer une Category
                $id=$request->deleteCategory;
                $category=Category::findOrFail($id);
                $category->delete();

                return redirect('/admin')->with('success', "Vos modification en été enregistré!!!");
        } else if($request->has('modifyCategory')){
            //Modifier Une Category
            $categories=$request->categories;
                foreach($categories as $id=>$category){
                    $validated= Validator::make($category, [
                    'name'=>['required', 'string', 'max:255', Rule::unique('categories', 'name')->ignore($id)],
                ])->validate();
                //ici on fait en deux temps au lieu d'un updateOrCreate! 
                //essayez avec updateOrCreate pour voir Moi j'avais rencontré un probleme c'est pourquoi 
                //j'ai fait ainsi mais j'ai l'impression que j'avais juste male ecrit la fonction!
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
            //Ajouter Une Category et afficher un champ de façon dynamique pour creer la new Category
            $users= User::paginate(7, ['*'], 'users');
            $categories= Category::paginate(4, ['*'], 'categories');
            $ajouter='';
            return view('freeads.admin', compact('users', 'categories', 'ajouter'));
        }else if($request->has('q')){
            //Effectuer des recherches sur le login, email et numero utilisateur
            $input=$request->q;
            $users=User::where('login', 'LIKE', "%$input%")
            ->orWhere('email', 'LIKE', "%$input%")
            ->orWhere('phone_number', 'LIKE', "%$input%")->paginate(7, ['*'], 'users');
            $categories= Category::paginate(4, ['*'], 'categories');

            return view('freeads.admin', compact('users', 'categories'));
        }

    }

    public function modifyAvatar(Request $request){
        //Ajouter Ou Modifier un Avatar sur le profile
        $validated=$request->validate([
            'avatar'=>'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($request->hasFile('avatar')){
            $user= Auth::user();
            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);//on supprime le fichier physique dans le dossier storage/images/
            }
            $path = $request->file('avatar')->store('images', 'public');
            $user->update(['avatar'=> $path]);
        }
        return back();
    }

        
        //annonces Admin CRUD
    public function annoncesActions(Request $request){
        if($request->has('deleteAds')){
            //Supprimer une annonce
            $id=$request->deleteAds;
            $annonces= Ad::findOrFail($id);
            $annonces->delete();
            return redirect('/admin/annonces');
        }else if($request->has('q')){
            //faire des recherches sur l'annonces! ici avec REGEXP c'est plus pertinent car on cherche sur de long texte
            //Voir Aussi Match AGAINST qui est extremement rapide
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