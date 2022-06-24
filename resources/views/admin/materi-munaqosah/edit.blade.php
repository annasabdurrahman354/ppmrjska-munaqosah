@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.materiMunaqosah.title_singular') }}:
                    {{ trans('cruds.materiMunaqosah.fields.id') }}
                    {{ $materiMunaqosah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('admin.materi-munaqosah.edit', [$materiMunaqosah])
        </div>
    </div>
</div>
@endsection