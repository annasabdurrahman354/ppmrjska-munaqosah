<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NilaiMunaqosah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NilaiMunaqosahController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nilai_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nilai-munaqosah.index');
    }

    public function create()
    {
        abort_if(Gate::denies('nilai_munaqosah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nilai-munaqosah.create');
    }

    public function edit(NilaiMunaqosah $nilaiMunaqosah)
    {
        abort_if(Gate::denies('nilai_munaqosah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nilai-munaqosah.edit', compact('nilaiMunaqosah'));
    }

    public function show(NilaiMunaqosah $nilaiMunaqosah)
    {
        abort_if(Gate::denies('nilai_munaqosah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nilaiMunaqosah->load('user', 'jadwalMunaqosah', 'materiMunaqosah', 'dewanGuru');

        return view('admin.nilai-munaqosah.show', compact('nilaiMunaqosah'));
    }
}