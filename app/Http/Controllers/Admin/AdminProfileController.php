<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function show(Request $request)
    {
        $this->authorize('auth_profile_edit');

        return view('admin.profile.show');
    }
}