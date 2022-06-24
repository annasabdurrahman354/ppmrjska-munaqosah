@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.kabupaten.title_singular') }}:
                    {{ trans('cruds.kabupaten.fields.id') }}
                    {{ $kabupaten->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.kabupaten.fields.id') }}
                            </th>
                            <td>
                                {{ $kabupaten->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kabupaten.fields.provinsi') }}
                            </th>
                            <td>
                                @if($kabupaten->provinsi)
                                    <span class="badge badge-relationship">{{ $kabupaten->provinsi->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.kabupaten.fields.name') }}
                            </th>
                            <td>
                                {{ $kabupaten->name }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('kabupaten_edit')
                    <a href="{{ route('admin.kabupatens.edit', $kabupaten) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.kabupatens.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection