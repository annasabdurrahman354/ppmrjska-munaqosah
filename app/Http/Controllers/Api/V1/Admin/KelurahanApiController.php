<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKelurahanRequest;
use App\Http\Requests\UpdateKelurahanRequest;
use App\Http\Resources\Admin\KelurahanResource;
use App\Models\Kelurahan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KelurahanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kelurahan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KelurahanResource(Kelurahan::with(['kecamatan'])->get());
    }

    public function store(StoreKelurahanRequest $request)
    {
        $kelurahan = Kelurahan::create($request->validated());

        return (new KelurahanResource($kelurahan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Kelurahan $kelurahan)
    {
        abort_if(Gate::denies('kelurahan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KelurahanResource($kelurahan->load(['kecamatan']));
    }

    public function update(UpdateKelurahanRequest $request, Kelurahan $kelurahan)
    {
        $kelurahan->update($request->validated());

        return (new KelurahanResource($kelurahan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Kelurahan $kelurahan)
    {
        abort_if(Gate::denies('kelurahan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelurahan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}