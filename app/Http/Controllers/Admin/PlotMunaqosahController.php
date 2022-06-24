<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlotMunaqosah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlotMunaqosahController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('plot_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plot-munaqosah.index');
    }

    public function create()
    {
        abort_if(Gate::denies('plot_munaqosah_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plot-munaqosah.create');
    }

    public function edit(PlotMunaqosah $plotMunaqosah)
    {
        abort_if(Gate::denies('plot_munaqosah_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.plot-munaqosah.edit', compact('plotMunaqosah'));
    }

    public function show(PlotMunaqosah $plotMunaqosah)
    {
        abort_if(Gate::denies('plot_munaqosah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plotMunaqosah->load('jadwalMunaqosah', 'user');

        return view('admin.plot-munaqosah.show', compact('plotMunaqosah'));
    }
}