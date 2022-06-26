@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.materiMunaqosah.title_singular') }}:
                    {{ trans('cruds.materiMunaqosah.fields.id') }}
                    {{ $materiMunaqosah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.materiMunaqosah.fields.id') }}
                            </th>
                            <td>
                                {{ $materiMunaqosah->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiMunaqosah.fields.materi') }}
                            </th>
                            <td>
                                {{ $materiMunaqosah->materi }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiMunaqosah.fields.jenis') }}
                            </th>
                            <td>
                                {{ $materiMunaqosah->jenis_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiMunaqosah.fields.keterangan') }}
                            </th>
                            <td>
                                {{ $materiMunaqosah->keterangan }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiMunaqosah.fields.angkatan') }}
                            </th>
                            <td>
                                {{ $materiMunaqosah->angkatan }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiMunaqosah.fields.tahun_pelajaran') }}
                            </th>
                            <td>
                                {{ $materiMunaqosah->tahun_pelajaran }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiMunaqosah.fields.semester') }}
                            </th>
                            <td>
                                {{ $materiMunaqosah->semester }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-8">
            @livewire('admin.materi-munaqosah.plot', [$materiMunaqosah])
            </div>

            <div class="form-group">
                @can('materi_munaqosah_edit')
                    <a href="{{ route('admin.materi-munaqosah.edit', $materiMunaqosah) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.materi-munaqosah.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection