<?php

return [
    'userManagement' => [
        'title'          => 'Manajemen Pengguna',
        'title_singular' => 'Manajemen Pengguna',
    ],
    'permission' => [
        'title'          => 'Izin',
        'title_singular' => 'Izin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Peranan',
        'title_singular' => 'Peranan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Daftar Pengguna',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Nama',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'locale'                   => 'Locale',
            'locale_helper'            => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'provinsi'                 => 'Provinsi',
            'provinsi_helper'          => ' ',
            'kabupaten'                => 'Kota',
            'kabupaten_helper'         => ' ',
            'nis'                      => 'Nomor Induk Santri',
            'nis_helper'               => ' ',
            'desa'                     => 'Asal Desa',
            'desa_helper'              => ' ',
            'kelompok'                 => 'Asal Kelompok',
            'kelompok_helper'          => ' ',
            'daerah'                   => 'Asal Daerah',
            'daerah_helper'            => ' ',
            'status'                   => 'Status',
            'status_helper'            => ' ',
            'telepon'                  => 'Telepon',
            'telepon_helper'           => 'Nomor telepon dan WhatsApp',
            'alamat'                   => 'Alamat Lengkap',
            'alamat_helper'            => ' ',
            'universitas'              => 'Universitas',
            'universitas_helper'       => ' ',
            'prodi'                    => 'Program Studi',
            'prodi_helper'             => ' ',
            'angkatan_ppm'             => 'Angkatan PPM',
            'angkatan_ppm_helper'      => 'Tahun angkatan PPM',
            'angkatan_kuliah'          => 'Angkatan Kuliah',
            'angkatan_kuliah_helper'   => ' ',
            'jenis_kelamin'            => 'Jenis Kelamin',
        ],
    ],
    'munaqosah' => [
        'title'          => 'Munaqosah',
        'title_singular' => 'Munaqosah',
    ],
    'kalenderMunaqosah' => [
        'title'          => 'Kalender Munaqosah',
        'title_singular' => 'Kalender Munaqosah',
    ],
    'management' => [
        'title'          => 'Database',
        'title_singular' => 'Database',
    ],
    'provinsi' => [
        'title'          => 'Provinsi',
        'title_singular' => 'Provinsi',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nama',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'kabupaten' => [
        'title'          => 'Kota',
        'title_singular' => 'Kota',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'provinsi'          => 'Provinsi',
            'provinsi_helper'   => ' ',
            'name'              => 'Nama',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'jadwalMunaqosah' => [
        'title'          => 'Jadwal Munaqosah',
        'title_singular' => 'Jadwal Munaqosah',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'sesi'               => 'Sesi',
            'sesi_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'dewan_guru'         => 'Dewan Guru',
            'dewan_guru_helper'  => ' ',
            'maks_santri'        => 'Maksimal Santri',
            'maks_santri_helper' => ' ',
            'materi'             => 'Materi',
            'materi_helper'      => ' ',
            'keterangan'         => 'Keterangan',
            'keterangan_helper'  => ' ',
        ],
    ],
    'dewanGuru' => [
        'title'          => 'Dewan Guru',
        'title_singular' => 'Dewan Guru',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nama',
            'name_helper'       => ' ',
            'alamat'            => 'Alamat',
            'alamat_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'telepon'           => 'Nomor Telepon',
            'telepon_helper'    => 'Nomor telepon dan WhatsApp',
        ],
    ],
    'plotMunaqosah' => [
        'title'          => 'Plot Munaqosah',
        'title_singular' => 'Plot Munaqosah',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'jadwal_munaqosah'        => 'Jadwal Munaqosah',
            'jadwal_munaqosah_helper' => ' ',
            'user'                    => 'Santri',
            'user_helper'             => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'nilaiMunaqosah' => [
        'title'          => 'Nilai Munaqosah',
        'title_singular' => 'Nilai Munaqosah',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'user'                     => 'Santri',
            'user_helper'              => ' ',
            'nilai_bacaan'             => 'Nilai Bacaan',
            'nilai_bacaan_helper'      => ' ',
            'nilai_kelengkapan'        => 'Nilai Kelengkapan Materi',
            'nilai_kelengkapan_helper' => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'nilai_pemahaman'          => 'Nilai Pemahaman Materi',
            'nilai_pemahaman_helper'   => ' ',
            'jadwal_munaqosah'         => 'Jadwal Munaqosah',
            'jadwal_munaqosah_helper'  => ' ',
            'materi_munaqosah'         => 'Materi Munaqosah',
            'materi_munaqosah_helper'  => ' ',
            'dewan_guru'               => 'Dewan Guru',
            'dewan_guru_helper'        => ' ',
        ],
    ],
    'materiMunaqosah' => [
        'title'          => 'Materi Munaqosah',
        'title_singular' => 'Materi Munaqosah',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'materi'                 => 'Materi',
            'materi_helper'          => ' ',
            'hafalan'                => 'Hafalan',
            'hafalan_helper'         => ' ',
            'keterangan'             => 'Keterangan',
            'keterangan_helper'      => ' ',
            'jenis'                  => 'Jenis',
            'jenis_helper'           => ' ',
            'angkatan'               => 'Angkatan',
            'angkatan_helper'        => ' ',
            'tahun_pelajaran'        => 'Tahun Pelajaran',
            'tahun_pelajaran_helper' => ' ',
            'semester'               => 'Semester',
            'semester_helper'        => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
];