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
        'Al Quran'      => 'Al Quran',
        'Himpunan'      => 'Himpunan',
        'Materi Kelas'  => 'Materi Kelas',
        'Materi Kelas'  => 'Materi Kelas',
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

    public function getMateriMunaqosahPluckAttribute()
    {
        return "{$this->materi} ({$this->angkatan})";
    }

    public function getJenisLabelAttribute($value)
    {
        return static::JENIS_SELECT[$this->jenis] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function jadwalMunaqosahs()
    {
        return $this->hasMany(JadwalMunaqosah::class);
    }

    public function plots()
    {
        return PlotMunaqosah::whereRelation('jadwalMunaqosah', 'materi_id', '=', $this->id);
    }
}