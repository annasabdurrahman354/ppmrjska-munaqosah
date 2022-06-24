@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.kecamatan.title_singular') }}:
                    {{ trans('cruds.kecamatan.fields.id') }}
                    {{ $kecamatan->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.kecamatan.fields.id') }}
                            </th>
                            <td>
                                {{ $kecamatan->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kecamatan.fields.kabupaten') }}
                            </th>
                            <td>
                                @if($kecamatan->kabupaten)
                                    <span class="badge badge-relationship">{{ $kecamatan->kabupaten->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kecamatan.fields.name') }}
                            </th>
                            <td>
                                {{ $kecamatan->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('kecamatan_edit')
                    <a href="{{ route('admin.kecamatans.edit', $kecamatan) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.kecamatans.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection