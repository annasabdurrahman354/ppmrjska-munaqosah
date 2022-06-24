@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.nilaiMunaqosah.title_singular') }}:
                    {{ trans('cruds.nilaiMunaqosah.fields.id') }}
                    {{ $nilaiMunaqosah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.nilaiMunaqosah.fields.id') }}
                            </th>
                            <td>
                                {{ $nilaiMunaqosah->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nilaiMunaqosah.fields.user') }}
                            </th>
                            <td>
                                @if($nilaiMunaqosah->user)
                                    <span class="badge badge-relationship">{{ $nilaiMunaqosah->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nilaiMunaqosah.fields.jadwal_munaqosah') }}
                            </th>
                            <td>
                                @if($nilaiMunaqosah->jadwalMunaqosah)
                                    <span class="badge badge-relationship">{{ $nilaiMunaqosah->jadwalMunaqosah->sesi ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nilaiMunaqosah.fields.materi_munaqosah') }}
                            </th>
                            <td>
                                @if($nilaiMunaqosah->materiMunaqosah)
                                    <span class="badge badge-relationship">{{ $nilaiMunaqosah->materiMunaqosah->materi ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nilaiMunaqosah.fields.dewan_guru') }}
                            </th>
                            <td>
                                @if($nilaiMunaqosah->dewanGuru)
                                    <span class="badge badge-relationship">{{ $nilaiMunaqosah->dewanGuru->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nilaiMunaqosah.fields.nilai_bacaan') }}
                            </th>
                            <td>
                                {{ $nilaiMunaqosah->nilai_bacaan }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nilaiMunaqosah.fields.nilai_pemahaman') }}
                            </th>
                            <td>
                                {{ $nilaiMunaqosah->nilai_pemahaman }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.nilaiMunaqosah.fields.nilai_kelengkapan') }}
                            </th>
                            <td>
                                {{ $nilaiMunaqosah->nilai_kelengkapan }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('nilai_munaqosah_edit')
                    <a href="{{ route('admin.nilai-munaqosah.edit', $nilaiMunaqosah) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.nilai-munaqosah.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection