<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function displayUsers(){
        $users= User::paginate(7);

        return view('freeads.admin', compact('users'));
    }
/*
    public function deleteUser(Request $request){
        $id=$request->deleteUser;
        $user=User::findOrFail($id);
        $user->delete();
        //User::where('id', $id)->deleteOrFail();
        
        return redirect('/admin');
    }

*/


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
                // foreach($validated as $key=>$value){
                //     User::where('id', $key)->update([
                //         'login'=>$user['login'], 
                //         'email'=>$user['email'],
                //         'phone_number'=>$user['phone_number'], 
                //         'role'=>$user['role']
                //         ]);
                // }

            }   

        }
    }
