<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function showLoginForm(){
        return view('backend.modules.login.login');
    }
    public function showRegistrationForm(){
        return view('backend.modules.registration.registration');
    }
    public function registration(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'password'=>'required|min:6'

        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);
        return redirect()->route('login.form')->with('success','User Registration Successful.');

    }

    public function login(Request $request){
        //validate input
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        //authenticate
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if(Auth::attempt($credentials)){
            $request -> session() -> regenerate();
            if(auth()->user()->role == 'admin'){
                return redirect()->route('sch.dashboard');
            }
            elseif(auth()->user()->role == 'worker'){
                return redirect()->route('show.dashboard');
            }
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);
    }
    public function logout(){
        Auth::logout();

        return redirect()->route('login.form')->with('success','Logout Successful.');
    }



}
