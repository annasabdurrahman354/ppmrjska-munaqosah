<?php

use App\Http\Controllers\Api\V1\Admin\DewanGuruApiController;
use App\Http\Controllers\Api\V1\Admin\JadwalMunaqosahApiController;
use App\Http\Controllers\Api\V1\Admin\KabupatenApiController;
use App\Http\Controllers\Api\V1\Admin\MateriMunaqosahApiController;
use App\Http\Controllers\Api\V1\Admin\NilaiMunaqosahApiController;
use App\Http\Controllers\Api\V1\Admin\PlotMunaqosahApiController;
use App\Http\Controllers\Api\V1\Admin\ProvinsiApiController;
use App\Http\Controllers\Api\V1\Admin\RoleApiController;
use App\Http\Controllers\Api\V1\Admin\UserApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Roles
    Route::apiResource('roles', RoleApiController::class);

    // Users
    Route::apiResource('users', UserApiController::class);

    // Provinsi
    Route::apiResource('provinsis', ProvinsiApiController::class);

    // Kabupaten
    Route::apiResource('kabupatens', KabupatenApiController::class);

    // Jadwal Munaqosah
    Route::apiResource('jadwal-munaqosah', JadwalMunaqosahApiController::class);

    // Dewan Guru
    Route::apiResource('dewan-guru', DewanGuruApiController::class);

    // Plot Munaqosah
    Route::apiResource('plot-munaqosah', PlotMunaqosahApiController::class);

    // Nilai Munaqosah
    Route::apiResource('nilai-munaqosah', NilaiMunaqosahApiController::class);

    // Materi Munaqosah
    Route::apiResource('materi-munaqosah', MateriMunaqosahApiController::class);
});