<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    use HasFactory;
    use HasAdvancedFilter;

    public $table = 'kabupatens';

    public $orderable = [
        'id',
        'provinsi.name',
        'name',
    ];

    public $filterable = [
        'id',
        'provinsi.name',
        'name',
    ];

    protected $fillable = [
        'provinsi_id',
        'name',
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}