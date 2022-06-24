@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.plotMunaqosah.title_singular') }}:
                    {{ trans('cruds.plotMunaqosah.fields.id') }}
                    {{ $plotMunaqosah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.plotMunaqosah.fields.id') }}
                            </th>
                            <td>
                                {{ $plotMunaqosah->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.plotMunaqosah.fields.jadwal_munaqosah') }}
                            </th>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah)
                                    <span class="badge badge-relationship">{{ $plotMunaqosah->jadwalMunaqosah->sesi ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.plotMunaqosah.fields.user') }}
                            </th>
                            <td>
                                @if($plotMunaqosah->user)
                                    <span class="badge badge-relationship">{{ $plotMunaqosah->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('plot_munaqosah_edit')
                    <a href="{{ route('admin.plot-munaqosah.edit', $plotMunaqosah) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.plot-munaqosah.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection