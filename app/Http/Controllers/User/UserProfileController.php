<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.profile.index', compact('user'));
    }

    public function edit()
    {
        $contactCheck = false;
        if(Auth::user()->telepon == Null || Auth::user()->email == Null){
            $contactCheck = true;
            
        }
        return view('user.profile.edit', compact('contactCheck'));
    }
}