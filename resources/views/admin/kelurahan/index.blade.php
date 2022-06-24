@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.kelurahan.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('kelurahan_create')
                    <a class="btn btn-indigo" href="{{ route('admin.kelurahans.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.kelurahan.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('admin.kelurahan.index')

    </div>
</div>
@endsection