<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserMunaqosahController extends Controller
{
    public function index()
    {
        return view('user.munaqosah.index');
    }
}