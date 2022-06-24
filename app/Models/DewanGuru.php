<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DewanGuru extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'dewan_gurus';

    public $orderable = [
        'id',
        'name',
        'telepon',
        'alamat',
    ];

    public $filterable = [
        'id',
        'name',
        'telepon',
        'alamat',
    ];

    protected $fillable = [
        'name',
        'telepon',
        'alamat',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}