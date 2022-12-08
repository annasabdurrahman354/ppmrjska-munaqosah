<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNilaiMunaqosahRequest;
use App\Http\Requests\UpdateNilaiMunaqosahRequest;
use App\Http\Resources\Admin\NilaiMunaqosahResource;
use App\Models\NilaiMunaqosah;
use Gate;
use Illuminate\Http\Response;

class NilaiMunaqosahApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nilai_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NilaiMunaqosahResource(NilaiMunaqosah::with(['user', 'jadwalMunaqosah', 'materiMunaqosah', 'dewanGuru'])->get());
    }

    public function store(StoreNilaiMunaqosahRequest $request)
    {
        $nilaiMunaqosah = NilaiMunaqosah::create($request->validated());

        return (new NilaiMunaqosahResource($nilaiMunaqosah))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NilaiMunaqosah $nilaiMunaqosah)
    {
        abort_if(Gate::denies('nilai_munaqosah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NilaiMunaqosahResource($nilaiMunaqosah->load(['user', 'jadwalMunaqosah', 'materiMunaqosah', 'dewanGuru']));
    }

    public function update(UpdateNilaiMunaqosahRequest $request, NilaiMunaqosah $nilaiMunaqosah)
    {
        $nilaiMunaqosah->update($request->validated());

        return (new NilaiMunaqosahResource($nilaiMunaqosah))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NilaiMunaqosah $nilaiMunaqosah)
    {
        abort_if(Gate::denies('nilai_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nilaiMunaqosah->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}