<?php

namespace App\Http\Controllers\backend\worker;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showUserProfile()
    {
        $title = 'User Profile';
        $users = auth()->user();
        $workers = $users->userProfile;
        return view('backend.workerModules.profile.profile', compact('title', 'users', 'workers'));
    }




    public function updatePassword(Request $request)
    {
        if (!Hash::check($request->input('current_password'), auth()->user()->password)) {
            return redirect()->back()->with('error', 'Current Password does not match.');
        }


        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password'

        ]);


        if (Hash::check($request->input('new_password'), auth()->user()->password)) {
            return redirect()->back()->with('error', 'New password should not match the old one.');
        }



        // $workers = Worker::find($request->id);
        // $users = User::find($workers->user_id);
        $users = User::find(auth()->user()->id);
        // dd($users);
        $users -> update([
            'password' => bcrypt($request->new_password)
        ]);

        // $users->password = $request->bcrypt($request->password);
        // $users->save();
        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function editProfile($id)
    {
        $title = 'Edit Profile';
        $profile = User::find($id);
        $workers = Worker::find($profile->userProfile->id);
        // dd($workers);

        return view('backend.workerModules.profile.updateProfile', compact('title', 'profile', 'workers'));
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'email'=>'email|unique:users',
        ]);

        $profile = User::find($id);
        $workers = Worker::find($profile->userProfile->id);



        $profile -> update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $dateOfBirth = $request->date_of_birth;
        $years = Carbon::parse($dateOfBirth)->age;

        $workers -> update([
            'contact' => $request->contact,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'age' => $years,
        ]);

        return redirect()->route('display.UserProfile')->with('success', 'Profile updated successfully.');
    }
}
