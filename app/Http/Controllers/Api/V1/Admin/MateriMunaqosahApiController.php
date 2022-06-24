<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMateriMunaqosahRequest;
use App\Http\Requests\UpdateMateriMunaqosahRequest;
use App\Http\Resources\Admin\MateriMunaqosahResource;
use App\Models\MateriMunaqosah;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MateriMunaqosahApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('materi_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MateriMunaqosahResource(MateriMunaqosah::all());
    }

    public function store(StoreMateriMunaqosahRequest $request)
    {
        $materiMunaqosah = MateriMunaqosah::create($request->validated());

        return (new MateriMunaqosahResource($materiMunaqosah))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MateriMunaqosah $materiMunaqosah)
    {
        abort_if(Gate::denies('materi_munaqosah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MateriMunaqosahResource($materiMunaqosah);
    }

    public function update(UpdateMateriMunaqosahRequest $request, MateriMunaqosah $materiMunaqosah)
    {
        $materiMunaqosah->update($request->validated());

        return (new MateriMunaqosahResource($materiMunaqosah))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MateriMunaqosah $materiMunaqosah)
    {
        abort_if(Gate::denies('materi_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiMunaqosah->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}