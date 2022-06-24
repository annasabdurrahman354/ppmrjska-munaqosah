@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.materiKbm.title_singular') }}:
                    {{ trans('cruds.materiKbm.fields.id') }}
                    {{ $materiKbm->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.materiKbm.fields.id') }}
                            </th>
                            <td>
                                {{ $materiKbm->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiKbm.fields.materi') }}
                            </th>
                            <td>
                                {{ $materiKbm->materi }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiKbm.fields.jenis') }}
                            </th>
                            <td>
                                {{ $materiKbm->jenis_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.materiKbm.fields.halaman') }}
                            </th>
                            <td>
                                {{ $materiKbm->halaman }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('materi_kbm_edit')
                    <a href="{{ route('admin.materi-kbm.edit', $materiKbm) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.materi-kbm.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection