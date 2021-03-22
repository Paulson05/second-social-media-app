<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Couchbase\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public  function getSignUp(){

        return view ('Auth.signup');
    }
    public function postSignUp(Request $request){
        $this->validate($request,[
            'email' => 'required|unique:users|email|max:250',
            'username'=> 'required',
            'password'=> 'required|max:20'
            ]);
        $array=collect($request->only(['email','username']))->put('password',bcrypt($request->password))->all();
        Users::create($array);
        return redirect()->back()->with('info', 'your are successfully register');
    }
    public function getLogin(){
        return view ('Auth.login');
    }
    public  function  postLogin(Request $request){

        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){

            return redirect()->back()->with('info', 'could not sign you in with those details');

        }

        return redirect()->route('home')
            ->with('info', 'you are successfully signed in!');

    }
    public  function logOut(){

     Auth::logout();
     return redirect()->route('home');
}
}
