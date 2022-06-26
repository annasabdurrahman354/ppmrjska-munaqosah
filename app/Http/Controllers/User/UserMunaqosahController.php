<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JadwalMunaqosah;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserMunaqosahController extends Controller
{
    public function index()
    {
        return view('user.munaqosah.index');
    }

    public function plot($jadwalMunaqosah)
    {
        $temp = JadwalMunaqosah::where('id', $jadwalMunaqosah)->first();
        return view('user.munaqosah.plot', ['jadwalMunaqosah' => $temp]);
    }

}
