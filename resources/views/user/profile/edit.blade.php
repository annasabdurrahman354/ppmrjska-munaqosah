@extends('layouts.user')
@section('header')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 font-semibold">
        Profile
    </div>
</header>
@stop
@section('content')
<div class="row">
    <div class="card bg-gray-100">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    @if($contactCheck == true)
                        Lengkapi Profil Anda
                    @endif
                    @if($contactCheck == false)
                        Ubah Profil Anda
                    @endif
                </h6>
            </div>
        </div>
        <div class="card-body">
            <div class="pt-3">
                @livewire('user.profile.edit')
            </div>
        </div>
    </div>
</div>
@endsection
