@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.user.title_singular') }}:
                    {{ trans('cruds.user.fields.id') }}
                    {{ $user->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.nis') }}
                            </th>
                            <td>
                                {{ $user->nis }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.telepon') }}
                            </th>
                            <td>
                                {{ $user->telepon }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $user->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.universitas') }}
                            </th>
                            <td>
                                {{ $user->universitas }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.prodi') }}
                            </th>
                            <td>
                                {{ $user->prodi }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.angkatan_ppm') }}
                            </th>
                            <td>
                                {{ $user->angkatan_ppm }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.angkatan_kuliah') }}
                            </th>
                            <td>
                                {{ $user->angkatan_kuliah }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.daerah') }}
                            </th>
                            <td>
                                {{ $user->daerah }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.desa') }}
                            </th>
                            <td>
                                {{ $user->desa }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.kelompok') }}
                            </th>
                            <td>
                                {{ $user->kelompok }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.provinsi') }}
                            </th>
                            <td>
                                @if($user->provinsi)
                                    <span class="badge badge-relationship">{{ $user->provinsi->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.kabupaten') }}
                            </th>
                            <td>
                                @if($user->kabupaten)
                                    <span class="badge badge-relationship">{{ $user->kabupaten->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.kecamatan') }}
                            </th>
                            <td>
                                @if($user->kecamatan)
                                    <span class="badge badge-relationship">{{ $user->kecamatan->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.kelurahan') }}
                            </th>
                            <td>
                                @if($user->kelurahan)
                                    <span class="badge badge-relationship">{{ $user->kelurahan->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.alamat') }}
                            </th>
                            <td>
                                {{ $user->alamat }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.status') }}
                            </th>
                            <td>
                                {{ $user->status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email_verified_at') }}
                            </th>
                            <td>
                                {{ $user->email_verified_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.roles') }}
                            </th>
                            <td>
                                @foreach($user->roles as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.locale') }}
                            </th>
                            <td>
                                {{ $user->locale }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('user_edit')
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection