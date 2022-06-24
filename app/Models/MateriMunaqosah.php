<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MateriMunaqosah extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const JENIS_SELECT = [
        'quran'    => 'Al Quran',
        'himpunan' => 'Himpunan',
        'mk'       => 'Materi Kelas',
        'lain'     => 'Materi Lain',
    ];

    public $table = 'materi_munaqosahs';

    public $orderable = [
        'id',
        'materi',
        'keterangan',
        'jenis',
        'angkatan',
        'tahun_pelajaran',
        'semester',
    ];

    public $filterable = [
        'id',
        'materi',
        'keterangan',
        'jenis',
        'angkatan',
        'tahun_pelajaran',
        'semester',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'materi',
        'keterangan',
        'jenis',
        'angkatan',
        'tahun_pelajaran',
        'semester',
    ];

    public function getJenisLabelAttribute($value)
    {
        return static::JENIS_SELECT[$this->jenis] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}