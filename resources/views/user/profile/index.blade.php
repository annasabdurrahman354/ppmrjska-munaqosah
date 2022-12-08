@extends('layouts.user')
@section('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 font-semibold">
        Profile
    </div>
</header>
@stop
@section('content')
<div class="row">
    <div class="card bg-gray-100">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Profil Anda
                </h6>
            </div>
        </div>
        
        <div class="card-body">
            <div class="pt-3" style="overflow-x:auto;">
                <table class="table table-view w-full">
                    <tbody class="bg-white">
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
                                {{ trans('cruds.user.fields.jenis_kelamin') }}
                            </th>
                            <td>
                                {{ $user->jenis_kelamin_label }}
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
                                {{ trans('cruds.user.fields.alamat') }}
                            </th>
                            <td>
                                {{ $user->alamat }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <a href="{{ route('user.profile.edit') }}" class="btn btn-indigo mr-2">
                    {{ trans('global.edit') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
