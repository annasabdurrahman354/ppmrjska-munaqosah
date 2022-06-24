@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.nilaiMunaqosah.title_singular') }}:
                    {{ trans('cruds.nilaiMunaqosah.fields.id') }}
                    {{ $nilaiMunaqosah->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('admin.nilai-munaqosah.edit', [$nilaiMunaqosah])
        </div>
    </div>
</div>
@endsection