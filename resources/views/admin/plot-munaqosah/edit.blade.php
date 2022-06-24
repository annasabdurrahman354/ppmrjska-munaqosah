@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.plotMunaqosah.title_singular') }}:
                    {{ trans('cruds.plotMunaqosah.fields.id') }}
                    {{ $plotMunaqosah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('plot-munaqosah.edit', [$plotMunaqosah])
        </div>
    </div>
</div>
@endsection