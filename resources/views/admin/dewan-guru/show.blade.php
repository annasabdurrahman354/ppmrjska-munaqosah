@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.dewanGuru.title_singular') }}:
                    {{ trans('cruds.dewanGuru.fields.id') }}
                    {{ $dewanGuru->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.dewanGuru.fields.id') }}
                            </th>
                            <td>
                                {{ $dewanGuru->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dewanGuru.fields.name') }}
                            </th>
                            <td>
                                {{ $dewanGuru->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dewanGuru.fields.telepon') }}
                            </th>
                            <td>
                                {{ $dewanGuru->telepon }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.dewanGuru.fields.alamat') }}
                            </th>
                            <td>
                                {{ $dewanGuru->alamat }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('dewan_guru_edit')
                    <a href="{{ route('admin.dewan-guru.edit', $dewanGuru) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.dewan-guru.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection