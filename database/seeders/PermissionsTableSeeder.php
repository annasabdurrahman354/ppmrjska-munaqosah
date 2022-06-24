<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'munaqosah_access',
            ],
            [
                'id'    => 19,
                'title' => 'kalender_munaqosah_access',
            ],
            [
                'id'    => 20,
                'title' => 'management_access',
            ],
            [
                'id'    => 21,
                'title' => 'provinsi_create',
            ],
            [
                'id'    => 22,
                'title' => 'provinsi_edit',
            ],
            [
                'id'    => 23,
                'title' => 'provinsi_show',
            ],
            [
                'id'    => 24,
                'title' => 'provinsi_delete',
            ],
            [
                'id'    => 25,
                'title' => 'provinsi_access',
            ],
            [
                'id'    => 26,
                'title' => 'kabupaten_create',
            ],
            [
                'id'    => 27,
                'title' => 'kabupaten_edit',
            ],
            [
                'id'    => 28,
                'title' => 'kabupaten_show',
            ],
            [
                'id'    => 29,
                'title' => 'kabupaten_delete',
            ],
            [
                'id'    => 30,
                'title' => 'kabupaten_access',
            ],
            [
                'id'    => 31,
                'title' => 'kecamatan_create',
            ],
            [
                'id'    => 32,
                'title' => 'kecamatan_edit',
            ],
            [
                'id'    => 33,
                'title' => 'kecamatan_show',
            ],
            [
                'id'    => 34,
                'title' => 'kecamatan_delete',
            ],
            [
                'id'    => 35,
                'title' => 'kecamatan_access',
            ],
            [
                'id'    => 36,
                'title' => 'kelurahan_create',
            ],
            [
                'id'    => 37,
                'title' => 'kelurahan_edit',
            ],
            [
                'id'    => 38,
                'title' => 'kelurahan_show',
            ],
            [
                'id'    => 39,
                'title' => 'kelurahan_delete',
            ],
            [
                'id'    => 40,
                'title' => 'kelurahan_access',
            ],
            [
                'id'    => 41,
                'title' => 'jadwal_munaqosah_create',
            ],
            [
                'id'    => 42,
                'title' => 'jadwal_munaqosah_edit',
            ],
            [
                'id'    => 43,
                'title' => 'jadwal_munaqosah_show',
            ],
            [
                'id'    => 44,
                'title' => 'jadwal_munaqosah_delete',
            ],
            [
                'id'    => 45,
                'title' => 'jadwal_munaqosah_access',
            ],
            [
                'id'    => 46,
                'title' => 'dewan_guru_create',
            ],
            [
                'id'    => 47,
                'title' => 'dewan_guru_edit',
            ],
            [
                'id'    => 48,
                'title' => 'dewan_guru_show',
            ],
            [
                'id'    => 49,
                'title' => 'dewan_guru_delete',
            ],
            [
                'id'    => 50,
                'title' => 'dewan_guru_access',
            ],
            [
                'id'    => 51,
                'title' => 'materi_kbm_create',
            ],
            [
                'id'    => 52,
                'title' => 'materi_kbm_edit',
            ],
            [
                'id'    => 53,
                'title' => 'materi_kbm_show',
            ],
            [
                'id'    => 54,
                'title' => 'materi_kbm_delete',
            ],
            [
                'id'    => 55,
                'title' => 'materi_kbm_access',
            ],
            [
                'id'    => 56,
                'title' => 'plot_munaqosah_create',
            ],
            [
                'id'    => 57,
                'title' => 'plot_munaqosah_edit',
            ],
            [
                'id'    => 58,
                'title' => 'plot_munaqosah_show',
            ],
            [
                'id'    => 59,
                'title' => 'plot_munaqosah_delete',
            ],
            [
                'id'    => 60,
                'title' => 'plot_munaqosah_access',
            ],
            [
                'id'    => 61,
                'title' => 'nilai_munaqosah_create',
            ],
            [
                'id'    => 62,
                'title' => 'nilai_munaqosah_edit',
            ],
            [
                'id'    => 63,
                'title' => 'nilai_munaqosah_show',
            ],
            [
                'id'    => 64,
                'title' => 'nilai_munaqosah_delete',
            ],
            [
                'id'    => 65,
                'title' => 'nilai_munaqosah_access',
            ],
            [
                'id'    => 66,
                'title' => 'materi_munaqosah_create',
            ],
            [
                'id'    => 67,
                'title' => 'materi_munaqosah_edit',
            ],
            [
                'id'    => 68,
                'title' => 'materi_munaqosah_show',
            ],
            [
                'id'    => 69,
                'title' => 'materi_munaqosah_delete',
            ],
            [
                'id'    => 70,
                'title' => 'materi_munaqosah_access',
            ],
            [
                'id'    => 71,
                'title' => 'kbm_access',
            ],
        ];

        Permission::insert($permissions);
    }
}