@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.materiKbm.title_singular') }}:
                    {{ trans('cruds.materiKbm.fields.id') }}
                    {{ $materiKbm->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('admin.materi-kbm.edit', [$materiKbm])
        </div>
    </div>
</div>
@endsection