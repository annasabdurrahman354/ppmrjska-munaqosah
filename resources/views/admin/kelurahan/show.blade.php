@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.kelurahan.title_singular') }}:
                    {{ trans('cruds.kelurahan.fields.id') }}
                    {{ $kelurahan->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.kelurahan.fields.id') }}
                            </th>
                            <td>
                                {{ $kelurahan->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kelurahan.fields.kecamatan') }}
                            </th>
                            <td>
                                @if($kelurahan->kecamatan)
                                    <span class="badge badge-relationship">{{ $kelurahan->kecamatan->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kelurahan.fields.name') }}
                            </th>
                            <td>
                                {{ $kelurahan->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('kelurahan_edit')
                    <a href="{{ route('admin.kelurahans.edit', $kelurahan) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.kelurahans.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection