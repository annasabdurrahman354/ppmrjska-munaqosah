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

    public function ingatkanMunaqosah($jadwalMunaqosah){
        $ptn = "/^0/";  // Regex
        $rpltxt = "+62";  // Replacement string
        $phone = preg_replace($ptn, $rpltxt, $this->telepon);
        $hari = Carbon::createFromFormat('d/m/Y H:i:s', $jadwalMunaqosah->sesi)->translatedFormat('l');
        $tanggal =  Carbon::createFromFormat('d/m/Y H:i:s', $jadwalMunaqosah->sesi)->translatedFormat('d F Y');
        $pukul =  Carbon::createFromFormat('d/m/Y H:i:s', $jadwalMunaqosah->sesi)->translatedFormat('H:i');
        $materi =  "{$jadwalMunaqosah->materi->materi} ({$jadwalMunaqosah->materi->keterangan})";
        $hafalan =  "{$jadwalMunaqosah->materi->hafalan}";
        $guru =  $jadwalMunaqosah->dewanGuru->name;
        $text = "%5B%20*REMINDER%20MUNAQOSYAH*%20%5D%0A%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%D9%88%D8%B1%D8%AD%D9%85%D8%A9%20%D8%A7%D9%84%D9%84%D9%87%20%D9%88%D8%A8%D8%B1%D9%83%D8%A7%D8%AA%D9%87.%20%0A%0AMengingatkan%20bahwa%20Anda%20*terjadwal%20Munaqosyah*%20%3A%0A%0AHari%2C%20tanggal%20%3A%20{$hari}%2C%20{$tanggal}%0APukul%20%3A%20{$pukul}%0AMateri%20%3A%20{$materi}%0AHafalan%20%3A%20{$hafalan}%0ADewan%20Guru%20%3A%20{$guru}%0A%0AUntuk%20tempat%20pelaksanaan%20bisa%20dilihat%20dijarkoman%20grup.%0A%0A*Nb*%3A%0AApabila%20berhalangan%20harap%20konfirmasi%20dan%20mencari%20pengganti%20untuk%20mengisi%20slot%20kosong!%0A%0A%D8%A7%D9%84%D8%AD%D9%85%D8%AF%20%D9%84%D9%84%D9%87%20%D8%AC%D8%B2%D8%A7%D9%83%D9%85%20%D8%A7%D9%84%D9%84%D9%87%20%D8%AE%D9%8A%D8%B1%D8%A7.%20%D8%A7%D9%84%D8%B3%D9%84%D8%A7%D9%85%20%D8%B9%D9%84%D9%8A%D9%83%D9%85%20%D9%88%D8%B1%D8%AD%D9%85%D8%A9%20%D8%A7%D9%84%D9%84%D9%87%20%D9%88%D8%A8%D8%B1%D9%83%D8%A7%D8%AA%D9%87.%20%0A____%0AS%26T%20Keilmuan%20%7C%20DMC-Pasus%20%7C%20PPMRJSka";
        $url = "https://wa.me/{$phone}?text={$text}";
        return $url;
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

    protected static function boot() 
    {
        parent::boot();

        static::deleting(function($user) {
            foreach ($user->plots()->get() as $plot) {
                $plot->delete();
            }
        });
    }
}