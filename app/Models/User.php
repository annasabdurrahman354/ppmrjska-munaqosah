<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasLocalePreference //,MustVerifyEmail
{
    use HasFactory;
    use HasAdvancedFilter;
    use Notifiable;
    use SoftDeletes;

    public const JENIS_KELAMIN_SELECT = [
        'Laki-laki' => 'Laki-laki',
        'Perempuan' => 'Perempuan',
    ];

    public const STATUS_SELECT = [
        'aktif'     => 'Aktif',
        'keluar'    => 'Keluar',
        'lulus'     => 'Lulus',
        'pendaftar' => 'Pendaftar',
    ];

    public $table = 'users';

    public $orderable = [
        'id',
        'name',
        'nis',
        'telepon',
        'email',
        'jenis_kelamin',
        'universitas',
        'prodi',
        'angkatan_ppm',
        'angkatan_kuliah',
        'daerah',
        'desa',
        'kelompok',
        'provinsi.name',
        'kabupaten.name',
        'kecamatan.name',
        'kelurahan.name',
        'alamat',
        'status',
        'email_verified_at',
        'locale',
    ];

    public $filterable = [
        'id',
        'name',
        'nis',
        'telepon',
        'email',
        'jenis_kelamin',
        'universitas',
        'prodi',
        'angkatan_ppm',
        'angkatan_kuliah',
        'daerah',
        'desa',
        'kelompok',
        'provinsi.name',
        'kabupaten.name',
        'kecamatan.name',
        'kelurahan.name',
        'alamat',
        'status',
        'email_verified_at',
        'roles.title',
        'locale',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'nis',
        'telepon',
        'email',
        'jenis_kelamin',
        'universitas',
        'prodi',
        'angkatan_ppm',
        'angkatan_kuliah',
        'daerah',
        'desa',
        'kelompok',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'kelurahan_id',
        'alamat',
        'status',
        'password',
        'locale',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function getNamaPluckAttribute()
    {
        return "{$this->name} ({$this->angkatan_ppm})";
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

    public function getJenisKelaminLabelAttribute($value)
    {
        return static::JENIS_KELAMIN_SELECT[$this->jenis_kelamin] ?? null;
    }

    public function plots()
    {
        return $this->hasMany(PlotMunaqosah::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function telahAmbilMateriMunaqosah($materi_id)
    {
        return $this->plots->where('materi_id', $materi_id)->isNotEmpty();
    }

    public function telahAmbilSesiMunaqosah($sesi)
    {
        return $this->plots->where('jadwal_munaqosah.sesi', $sesi)->isNotEmpty();
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}