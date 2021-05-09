<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function view($username){
        $user = User::where('username', '=', $username)->firstOrFail();
        $meals = $user->meals->where('public', '=', 1);

        return view('profilecontroller.view', compact('user', 'meals'));
    }


    public function edit(User $id){
        $user = $id;
        $this->authorize('update', $user);

        return view('profilecontroller.edit', compact('user'));
    }


    public function update(User $id){
        $user = $id;
        $this->authorize('update', $user);
        $data = request()->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'about' => ['nullable', 'string', 'max:255'],
            'url' => ['nullable', 'max:255'],
            'username' => ['nullable',
                'string',
                'min: 3',
                'max:255',
                'unique:users,username,'. Auth()->user()->id . ',id'],
            'email-optin' => ['nullable']
//TODO: Fix e-mail and password edit

//            'email' => ['required',
//                'string',
//                'email',
//                'max:255',
//                'unique:users,email,'. Auth()->user()->id . ',id'],
//            'password' => ['string', 'min:8', 'confirmed'],
        ]);
//        dd($data);
        $user->update([
            'username' => $data['username'],
            'name' => $data['name'],
            'about' => $data['about'],
            'url' => $data['url'],
            'email_optin' => isset($data['email-optin']) ? 1 : 0,
        ]);

        if($user->username){
            return redirect('/profile/' . $user->username)->with('status', 'Profiel aangepast!');
        }
        else{
            return redirect('/home')->with('status', 'Profiel aangepast! Maar geen gebruikersnaam opgegeven.');
        }

    }
}
