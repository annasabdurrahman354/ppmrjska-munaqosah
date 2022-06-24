<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKabupatenRequest;
use App\Http\Requests\UpdateKabupatenRequest;
use App\Http\Resources\Admin\KabupatenResource;
use App\Models\Kabupaten;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KabupatenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('kabupaten_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KabupatenResource(Kabupaten::with(['provinsi'])->get());
    }

    public function store(StoreKabupatenRequest $request)
    {
        $kabupaten = Kabupaten::create($request->validated());

        return (new KabupatenResource($kabupaten))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new KabupatenResource($kabupaten->load(['provinsi']));
    }

    public function update(UpdateKabupatenRequest $request, Kabupaten $kabupaten)
    {
        $kabupaten->update($request->validated());

        return (new KabupatenResource($kabupaten))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupaten->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}