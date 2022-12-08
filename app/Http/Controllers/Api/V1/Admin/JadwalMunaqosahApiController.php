<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJadwalMunaqosahRequest;
use App\Http\Requests\UpdateJadwalMunaqosahRequest;
use App\Http\Resources\Admin\JadwalMunaqosahResource;
use App\Models\JadwalMunaqosah;
use Gate;
use Illuminate\Http\Response;

class JadwalMunaqosahApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jadwal_munaqosah_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JadwalMunaqosahResource(JadwalMunaqosah::with(['materi', 'dewanGuru'])->get());
    }

    public function store(StoreJadwalMunaqosahRequest $request)
    {
        $jadwalMunaqosah = JadwalMunaqosah::create($request->validated());

        return (new JadwalMunaqosahResource($jadwalMunaqosah))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JadwalMunaqosah $jadwalMunaqosah)
    {
        abort_if(Gate::denies('jadwal_munaqosah_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JadwalMunaqosahResource($jadwalMunaqosah->load(['materi', 'dewanGuru']));
    }

    public function update(UpdateJadwalMunaqosahRequest $request, JadwalMunaqosah $jadwalMunaqosah)
    {
        $jadwalMunaqosah->update($request->validated());

        return (new JadwalMunaqosahResource($jadwalMunaqosah))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JadwalMunaqosah $jadwalMunaqosah)
    {
        abort_if(Gate::denies('jadwal_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwalMunaqosah->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}