<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAngkatanRequest;
use App\Http\Requests\UpdateAngkatanRequest;
use App\Http\Resources\Admin\AngkatanResource;
use App\Models\Angkatan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AngkatanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('angkatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AngkatanResource(Angkatan::all());
    }

    public function store(StoreAngkatanRequest $request)
    {
        $angkatan = Angkatan::create($request->validated());

        return (new AngkatanResource($angkatan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Angkatan $angkatan)
    {
        abort_if(Gate::denies('angkatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AngkatanResource($angkatan);
    }

    public function update(UpdateAngkatanRequest $request, Angkatan $angkatan)
    {
        $angkatan->update($request->validated());

        return (new AngkatanResource($angkatan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Angkatan $angkatan)
    {
        abort_if(Gate::denies('angkatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $angkatan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}