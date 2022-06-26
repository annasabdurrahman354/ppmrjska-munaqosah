<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalMunaqosah extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'jadwal_munaqosahs';

    public $orderable = [
        'id',
        'sesi',
        'materi.materi',
        'materi.keterangan',
        'materi.jenis',
        'materi.angkatan',
        'materi.tahun_pelajaran',
        'materi.semester',
        'dewan_guru.name',
        'maks_santri',
    ];

    public $filterable = [
        'id',
        'sesi',
        'materi.materi',
        'materi.keterangan',
        'materi.jenis',
        'materi.angkatan',
        'materi.tahun_pelajaran',
        'materi.semester',
        'dewan_guru.name',
        'maks_santri',
    ];

    protected $dates = [
        'sesi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sesi',
        'materi_id',
        'dewan_guru_id',
        'maks_santri',
    ];

    public function getFullJadwalAttribute()
    {
        return "{$this->sesi} - {$this->materi->materi} - {$this->dewanGuru->name} ({$this->materi->angkatan})";
    }

    public function getSesiAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setSesiAttribute($value)
    {
        $this->attributes['sesi'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function materi()
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

    public function plots()
    {
        return $this->hasMany(PlotMunaqosah::class);
    }

    public function getPlotsCountAttribute()
    {
       return $this->hasMany(PlotMunaqosah::class)->count();
   
    }
}