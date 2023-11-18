<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function show(){
        return view('home');
    }
    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => ['required' , 'email'],
            'password' => ['required']
        ]);
        if(auth()->attempt(request()->only(["email" , "password"]))){
            return redirect('main');
        }
        return redirect('/')->withErrors('email' , 'email ou mot de passe invalide');
        
    }
}
