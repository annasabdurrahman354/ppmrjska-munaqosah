<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalMunaqosah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JadwalMunaqosahController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jadwal_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jadwal-munaqosah.index');
    }

    public function create()
    {
        abort_if(Gate::denies('jadwal_munaqosah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jadwal-munaqosah.create');
    }

    public function edit(JadwalMunaqosah $jadwalMunaqosah)
    {
        abort_if(Gate::denies('jadwal_munaqosah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jadwal-munaqosah.edit', compact('jadwalMunaqosah'));
    }

    public function show(JadwalMunaqosah $jadwalMunaqosah)
    {
        abort_if(Gate::denies('jadwal_munaqosah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwalMunaqosah->load('materi', 'dewanGuru');

        return view('admin.jadwal-munaqosah.show', compact('jadwalMunaqosah'));
    }
}