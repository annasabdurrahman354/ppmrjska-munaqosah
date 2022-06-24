<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlotMunaqosah extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'plot_munaqosahs';

    public $orderable = [
        'id',
        'jadwal_munaqosah.sesi',
        'user.name',
    ];

    public $filterable = [
        'id',
        'jadwal_munaqosah.sesi',
        'user.name',
    ];

    protected $fillable = [
        'jadwal_munaqosah_id',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function jadwalMunaqosah()
    {
        return $this->belongsTo(JadwalMunaqosah::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}