<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KabupatenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kabupaten_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kabupaten.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kabupaten_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kabupaten.create');
    }

    public function edit(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kabupaten.edit', compact('kabupaten'));
    }

    public function show(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupaten->load('provinsi');

        return view('admin.kabupaten.show', compact('kabupaten'));
    }
}