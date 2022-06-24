<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DewanGuru;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DewanGuruController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dewan_guru_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dewan-guru.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dewan_guru_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dewan-guru.create');
    }

    public function edit(DewanGuru $dewanGuru)
    {
        abort_if(Gate::denies('dewan_guru_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dewan-guru.edit', compact('dewanGuru'));
    }

    public function show(DewanGuru $dewanGuru)
    {
        abort_if(Gate::denies('dewan_guru_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dewan-guru.show', compact('dewanGuru'));
    }
}