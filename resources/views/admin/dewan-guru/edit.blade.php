@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.dewanGuru.title_singular') }}:
                    {{ trans('cruds.dewanGuru.fields.id') }}
                    {{ $dewanGuru->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('admin.dewan-guru.edit', [$dewanGuru])
        </div>
    </div>
</div>
@endsection