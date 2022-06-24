<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MateriMunaqosah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MateriMunaqosahController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('materi_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materi-munaqosah.index');
    }

    public function create()
    {
        abort_if(Gate::denies('materi_munaqosah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materi-munaqosah.create');
    }

    public function edit(MateriMunaqosah $materiMunaqosah)
    {
        abort_if(Gate::denies('materi_munaqosah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materi-munaqosah.edit', compact('materiMunaqosah'));
    }

    public function show(MateriMunaqosah $materiMunaqosah)
    {
        abort_if(Gate::denies('materi_munaqosah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.materi-munaqosah.show', compact('materiMunaqosah'));
    }
}