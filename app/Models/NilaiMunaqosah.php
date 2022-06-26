<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NilaiMunaqosah extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'nilai_munaqosahs';

    public $orderable = [
        'id',
        'user.name',
        'user.angkatan_ppm',
        'user.jenis_kelamin',
        'jadwal_munaqosah.sesi',
        'materi_munaqosah.materi',
        'materi_munaqosah.keterangan',
        'materi_munaqosah.jenis',
        'materi_munaqosah.angkatan',
        'materi_munaqosah.tahun_pelajaran',
        'materi_munaqosah.semester',
        'dewan_guru.name',
        'nilai_bacaan',
        'nilai_pemahaman',
        'nilai_kelengkapan',
    ];

    public $filterable = [
        'id',
        'user.name',
        'user.angkatan_ppm',
        'user.jenis_kelamin',
        'jadwal_munaqosah.sesi',
        'materi_munaqosah.materi',
        'materi_munaqosah.keterangan',
        'materi_munaqosah.jenis',
        'materi_munaqosah.angkatan',
        'materi_munaqosah.tahun_pelajaran',
        'materi_munaqosah.semester',
        'dewan_guru.name',
        'nilai_bacaan',
        'nilai_pemahaman',
        'nilai_kelengkapan',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'jadwal_munaqosah_id',
        'materi_munaqosah_id',
        'dewan_guru_id',
        'nilai_bacaan',
        'nilai_pemahaman',
        'nilai_kelengkapan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwalMunaqosah()
    {
        return $this->belongsTo(JadwalMunaqosah::class);
    }

    public function materiMunaqosah()
    {
        return $this->belongsTo(MateriMunaqosah::class);
    }

    public function dewanGuru()
    {
        return $this->belongsTo(DewanGuru::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}