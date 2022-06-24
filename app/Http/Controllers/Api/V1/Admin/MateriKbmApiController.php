<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMateriKbmRequest;
use App\Http\Requests\UpdateMateriKbmRequest;
use App\Http\Resources\Admin\MateriKbmResource;
use App\Models\MateriKbm;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MateriKbmApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('materi_kbm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MateriKbmResource(MateriKbm::all());
    }

    public function store(StoreMateriKbmRequest $request)
    {
        $materiKbm = MateriKbm::create($request->validated());

        return (new MateriKbmResource($materiKbm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MateriKbm $materiKbm)
    {
        abort_if(Gate::denies('materi_kbm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MateriKbmResource($materiKbm);
    }

    public function update(UpdateMateriKbmRequest $request, MateriKbm $materiKbm)
    {
        $materiKbm->update($request->validated());

        return (new MateriKbmResource($materiKbm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MateriKbm $materiKbm)
    {
        abort_if(Gate::denies('materi_kbm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiKbm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}