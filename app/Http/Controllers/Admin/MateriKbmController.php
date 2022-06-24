<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MateriKbm;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MateriKbmController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('materi_kbm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materi-kbm.index');
    }

    public function create()
    {
        abort_if(Gate::denies('materi_kbm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materi-kbm.create');
    }

    public function edit(MateriKbm $materiKbm)
    {
        abort_if(Gate::denies('materi_kbm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materi-kbm.edit', compact('materiKbm'));
    }

    public function show(MateriKbm $materiKbm)
    {
        abort_if(Gate::denies('materi_kbm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materi-kbm.show', compact('materiKbm'));
    }
}