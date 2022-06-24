@extends('layouts.user')
@section('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 font-semibold">
        Munaqosah
    </div>
</header>
@stop
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Jadwal Munaqosah Anda
                </h6>
            </div>
        </div>
        @livewire('user.munaqosah.index')
    </div>
    <livewire:user.munaqosah.kalender-munaqosah-angkatan/>
</div>
@endsection
