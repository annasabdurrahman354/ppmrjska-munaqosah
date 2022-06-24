<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKecamatanRequest;
use App\Http\Requests\UpdateKecamatanRequest;
use App\Http\Resources\Admin\KecamatanResource;
use App\Models\Kecamatan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KecamatanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kecamatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KecamatanResource(Kecamatan::with(['kabupaten'])->get());
    }

    public function store(StoreKecamatanRequest $request)
    {
        $kecamatan = Kecamatan::create($request->validated());

        return (new KecamatanResource($kecamatan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Kecamatan $kecamatan)
    {
        abort_if(Gate::denies('kecamatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KecamatanResource($kecamatan->load(['kabupaten']));
    }

    public function update(UpdateKecamatanRequest $request, Kecamatan $kecamatan)
    {
        $kecamatan->update($request->validated());

        return (new KecamatanResource($kecamatan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Kecamatan $kecamatan)
    {
        abort_if(Gate::denies('kecamatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kecamatan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}