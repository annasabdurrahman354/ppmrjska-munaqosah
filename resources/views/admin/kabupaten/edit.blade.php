@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.kabupaten.title_singular') }}:
                    {{ trans('cruds.kabupaten.fields.id') }}
                    {{ $kabupaten->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('kabupaten.edit', [$kabupaten])
        </div>
    </div>
</div>
@endsection