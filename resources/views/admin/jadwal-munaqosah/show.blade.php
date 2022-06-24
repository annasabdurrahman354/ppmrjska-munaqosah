@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.jadwalMunaqosah.title_singular') }}:
                    {{ trans('cruds.jadwalMunaqosah.fields.id') }}
                    {{ $jadwalMunaqosah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.jadwalMunaqosah.fields.id') }}
                            </th>
                            <td>
                                {{ $jadwalMunaqosah->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.jadwalMunaqosah.fields.sesi') }}
                            </th>
                            <td>
                                {{ $jadwalMunaqosah->sesi }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.jadwalMunaqosah.fields.keterangan') }}
                            </th>
                            <td>
                                {{ $jadwalMunaqosah->keterangan }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.jadwalMunaqosah.fields.materi') }}
                            </th>
                            <td>
                                @if($jadwalMunaqosah->materi)
                                    <span class="badge badge-relationship">{{ $jadwalMunaqosah->materi->materi ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.jadwalMunaqosah.fields.dewan_guru') }}
                            </th>
                            <td>
                                @if($jadwalMunaqosah->dewanGuru)
                                    <span class="badge badge-relationship">{{ $jadwalMunaqosah->dewanGuru->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.jadwalMunaqosah.fields.maks_santri') }}
                            </th>
                            <td>
                                {{ $jadwalMunaqosah->maks_santri }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('jadwal_munaqosah_edit')
                    <a href="{{ route('admin.jadwal-munaqosah.edit', $jadwalMunaqosah) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.jadwal-munaqosah.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection