<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlotMunaqosahRequest;
use App\Http\Requests\UpdatePlotMunaqosahRequest;
use App\Http\Resources\Admin\PlotMunaqosahResource;
use App\Models\PlotMunaqosah;
use Gate;
use Illuminate\Http\Response;

class PlotMunaqosahApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('plot_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlotMunaqosahResource(PlotMunaqosah::with(['jadwalMunaqosah', 'user'])->get());
    }

    public function store(StorePlotMunaqosahRequest $request)
    {
        $plotMunaqosah = PlotMunaqosah::create($request->validated());

        return (new PlotMunaqosahResource($plotMunaqosah))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PlotMunaqosah $plotMunaqosah)
    {
        abort_if(Gate::denies('plot_munaqosah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PlotMunaqosahResource($plotMunaqosah->load(['jadwalMunaqosah', 'user']));
    }

    public function update(UpdatePlotMunaqosahRequest $request, PlotMunaqosah $plotMunaqosah)
    {
        $plotMunaqosah->update($request->validated());

        return (new PlotMunaqosahResource($plotMunaqosah))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PlotMunaqosah $plotMunaqosah)
    {
        abort_if(Gate::denies('plot_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plotMunaqosah->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}