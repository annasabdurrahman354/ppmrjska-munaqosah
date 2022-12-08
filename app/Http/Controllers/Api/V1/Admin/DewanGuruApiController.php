<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDewanGuruRequest;
use App\Http\Requests\UpdateDewanGuruRequest;
use App\Http\Resources\Admin\DewanGuruResource;
use App\Models\DewanGuru;
use Gate;
use Illuminate\Http\Response;

class DewanGuruApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dewan_guru_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DewanGuruResource(DewanGuru::all());
    }

    public function store(StoreDewanGuruRequest $request)
    {
        $dewanGuru = DewanGuru::create($request->validated());

        return (new DewanGuruResource($dewanGuru))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DewanGuru $dewanGuru)
    {
        abort_if(Gate::denies('dewan_guru_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DewanGuruResource($dewanGuru);
    }

    public function update(UpdateDewanGuruRequest $request, DewanGuru $dewanGuru)
    {
        $dewanGuru->update($request->validated());

        return (new DewanGuruResource($dewanGuru))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DewanGuru $dewanGuru)
    {
        abort_if(Gate::denies('dewan_guru_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dewanGuru->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}