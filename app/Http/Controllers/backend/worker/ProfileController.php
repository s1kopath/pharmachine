<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showUserProfile()
    {
        $title = 'User Profile';
        $users = auth()->user();
        $workers = $users->userProfile;
        return view('backend.workerModules.profile.profile', compact('title','users','workers'));
    }




    public  function updatePassword(Request $request){
        // $request->validate([
        //     'password' => 'required|min:6',

        // ]);




        // $workers = Worker::find($request->id);
        // $users = User::find($workers->user_id);
        // $users = User::find(auth()->user()->id);
        // dd($users);
        $users = User::create([
            'password' => bcrypt($request->password)
        ]);

        // $users->password = $request->bcrypt($request->password);
        // $users->save();

    }
}
