@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.materiMunaqosah.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('materi_munaqosah_create')
                    <a class="btn btn-indigo" href="{{ route('admin.materi-munaqosah.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.materiMunaqosah.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('materi-munaqosah.index')

    </div>
</div>
@endsection