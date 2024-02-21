<?php

use App\Http\Livewire\Auth\Register;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\DewanGuruController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JadwalMunaqosahController;
use App\Http\Controllers\Admin\KabupatenController;
use App\Http\Controllers\Admin\MateriMunaqosahController;
use App\Http\Controllers\Admin\NilaiMunaqosahController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PlotMunaqosahController;
use App\Http\Controllers\Admin\ProvinsiController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\KalenderMunaqosahController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserMunaqosahController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Livewire\Admin\ExportPlotMunaqosah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['guest']], function() {

    Route::get('/register', Register::class)->name('register');

});

//['auth', 'verified']

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {

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

    // Jadwal Munaqosah
    Route::resource('jadwal-munaqosah', JadwalMunaqosahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Dewan Guru
    Route::resource('dewan-guru', DewanGuruController::class, ['except' => ['store', 'update', 'destroy']]);

    // Plot Munaqosah
    Route::resource('plot-munaqosah', PlotMunaqosahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Nilai Munaqosah
    Route::resource('nilai-munaqosah', NilaiMunaqosahController::class, ['except' => ['store', 'update', 'destroy']]);

    // Materi Munaqosah
    Route::resource('materi-munaqosah', MateriMunaqosahController::class, ['except' => ['store', 'update', 'destroy']]);

    Route::get('/profile', [AdminProfileController::class, 'show'])->name('profile');

    Route::get('/kelola/plot-munaqosah', ExportPlotMunaqosah::class)->name('kelola.plot-munaqosah');

});

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth', 'contact.check']], function () {

    Route::get('/', function () { return view('user.home');})->name('home');
    Route::resource('munaqosah', UserMunaqosahController::class, ['only' => ['index']]);
    Route::get('profile/', [UserProfileController::class, 'index'])->name('profile.index');
    Route::get('munaqosah/plot/{jadwalMunaqosah}', [UserMunaqosahController::class, 'plot'])->name('munaqosah.plot')->where('jadwalMunaqosah', '[0-9]+');
});


Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth']], function () {
    Route::get('profile/edit/', [UserProfileController::class, 'edit'])->name('profile.edit');
});