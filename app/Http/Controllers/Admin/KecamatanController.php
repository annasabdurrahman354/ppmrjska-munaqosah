<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KecamatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kecamatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kecamatan.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kecamatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kecamatan.create');
    }

    public function edit(Kecamatan $kecamatan)
    {
        abort_if(Gate::denies('kecamatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kecamatan.edit', compact('kecamatan'));
    }

    public function show(Kecamatan $kecamatan)
    {
        abort_if(Gate::denies('kecamatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatan->load('kabupaten');

        return view('admin.kecamatan.show', compact('kecamatan'));
    }
}