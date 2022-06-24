<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KelurahanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kelurahan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelurahan.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kelurahan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelurahan.create');
    }

    public function edit(Kelurahan $kelurahan)
    {
        abort_if(Gate::denies('kelurahan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kelurahan.edit', compact('kelurahan'));
    }

    public function show(Kelurahan $kelurahan)
    {
        abort_if(Gate::denies('kelurahan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelurahan->load('kecamatan');

        return view('admin.kelurahan.show', compact('kelurahan'));
    }
}