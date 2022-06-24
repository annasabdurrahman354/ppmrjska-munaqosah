<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    
    public $table = 'kelurahans';

    public $orderable = [
        'id',
        'kecamatan.name',
        'name',
    ];

    public $filterable = [
        'id',
        'kecamatan.name',
        'name',
    ];

    protected $fillable = [
        'kecamatan_id',
        'name',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}