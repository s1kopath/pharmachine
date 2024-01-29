<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showAdminProfile()
    {
        $title = 'User Profile';
        return view('backend.modules.profile.profile', compact('title'));
    }
}
