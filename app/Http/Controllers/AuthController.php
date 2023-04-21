<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Session;

class AuthController extends Controller
{
    
    public function login(){
        return view('pages.auth.login');
    }

    public function athenticate(LoginRequest $request){
        $credential = $request->getCredentials();
       if(!Auth::validate($credential)):
        return redirect('/');
       endif;

       $user = Auth::getProvider()->retrieveByCredentials($credential);
       Auth::login($user);
    //    return $user;
       $user->last_login = now();
       $user->update();
       return $this->authenticated($request,$user);
    }

    public function authenticated(Request $request, $user){
        return redirect()->to('/dashboard');
     }

     public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect('/');
    }

}
