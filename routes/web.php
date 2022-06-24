<?php

use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Dashboard;
use App\Http\Controllers\Admin\DewanGuruController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JadwalMunaqosahController;
use App\Http\Controllers\Admin\KabupatenController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\KelurahanController;
use App\Http\Controllers\Admin\MateriKbmController;
use App\Http\Controllers\Admin\MateriMunaqosahController;
use App\Http\Controllers\Admin\NilaiMunaqosahController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PlotMunaqosahController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\KalenderMunaqosahController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['guest']], function() {
    Route::get('/register', Register::class)->name('register');
    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Kalender Munaqosah
    Route::resource('kalender-munaqosah', KalenderMunaqosahController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Provinsi
    Route::resource('provinsis', ProvinsiController::class, ['except' => ['store', 'update', 'destroy']]);

    // Kabupaten
    Route::resource('kabupatens', KabupatenController::class, ['except' => ['store', 'update', 'destroy']]);

    // Kecamatan
    Route::resource('kecamatans', KecamatanController::class, ['except' => ['store', 'update', 'destroy']]);

    // Kelurahan
    Route::resource('kelurahans', KelurahanController::class, ['except' => ['store', 'update', 'destroy']]);

    // Jadwal Munaqosah
    Route::resource('jadwal-munaqosah', JadwalMunaqosahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Dewan Guru
    Route::resource('dewan-guru', DewanGuruController::class, ['except' => ['store', 'update', 'destroy']]);

    // Materi Kbm
    Route::resource('materi-kbm', MateriKbmController::class, ['except' => ['store', 'update', 'destroy']]);

    // Plot Munaqosah
    Route::resource('plot-munaqosah', PlotMunaqosahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Nilai Munaqosah
    Route::resource('nilai-munaqosah', NilaiMunaqosahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Materi Munaqosah
    Route::resource('materi-munaqosah', MateriMunaqosahController::class, ['except' => ['store', 'update', 'destroy']]);

    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
});