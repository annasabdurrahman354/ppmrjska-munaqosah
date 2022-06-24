@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.jadwalMunaqosah.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('jadwal_munaqosah_create')
                    <a class="btn btn-indigo" href="{{ route('admin.jadwal-munaqosah.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.jadwalMunaqosah.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('jadwal-munaqosah.index')

    </div>
</div>
@endsection