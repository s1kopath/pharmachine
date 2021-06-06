<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('backend.modules.login.login');
    }
    public function showRegistrationForm()
    {
        return view('backend.modules.registration.registration');
    }
    public function forgetPasswordForm()
    {
        return view('backend.workerModules.forgetPassword.forget-password');
    }


    public function forgetFormSubmit(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Password::sendResetLink(
                $request->only('email')
            );
            return redirect()->back()->with('success', 'An email have been sent to your address.');
        } else {
            return redirect()->back()->with('error', 'Invalid email.');
        }
    }

    public function showResetForm($p_token, $p_email)
    {
        // dd(Carbon::now()->subMinutes(2));
        $check = PasswordReset::where('email', $p_email)->where('created_at','>=',Carbon::now()->subMinutes(2))->first();
        if ($check) {
            $token = $p_token;
            $email = $p_email;
            return view('backend.workerModules.forgetPassword.reset-password', compact('token', 'email'));
        } else {
            return redirect()->route('login.form')->with('error', 'Link expired');
        }
    }

    public function submitPassword(Request $request)
    {
        $request->validate([
            'token'=>'required',
            'email'=>'email|required',
            'password' => 'required|min:6|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
            }
        );
        return redirect()->route('login.form')->with('success', 'Password updated successfully.');
    }

    public function registration(Request $request)
    {
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
        return redirect()->route('login.form')->with('success', 'User Registration Successful.');
    }

    public function login(Request $request)
    {
        //validate input
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        //authenticate
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request -> session() -> regenerate();

            if (auth()->user()->role == 'admin') {
                return redirect()->route('sch.dashboard');
            } elseif (auth()->user()->role == 'worker') {
                return redirect()->route('show.home');
            }
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.form')->with('success', 'Logout Successful.');
    }
}
