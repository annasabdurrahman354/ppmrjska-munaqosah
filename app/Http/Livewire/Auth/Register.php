<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;

class Register extends Component
{
    public User $user;
    public string $password = '';
    public string $konfirmasi_password = '';
    public $provinsi = null;
    public $kabupaten = null;
    public $kecamatan = null;
    public $kelurahan = null;

    public $semuaProvinsi;
    public $semuaKabupaten;
    public $semuaKecamatan;
    public $semuaKelurahan;

    public $next = 0;

    public function next()
    {
        if($this->next != 2){
            $this->next = $this->next+1;
        }
    }

    public function back()
    {
        if($this->next != 0){
            $this->next = $this->next-1;
        }
    }

    public function mount()
    {
        $this->user = new User();
        $this->semuaProvinsi = Provinsi::all();
        $this->semuaKabupaten = collect();
        $this->semuaKecamatan = collect();
        $this->semuaKelurahan = collect();
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }

    public function store()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->provinsi_id = $this->provinsi;
        $this->user->kabupaten_id = $this->kabupaten;
        $this->user->kecamatan_id = $this->kecamatan;
        $this->user->kelurahan_id = $this->kelurahan;
        $this->user->save();
        $this->user->roles()->sync(2);
        
        event(new Registered($this->user));
        Auth::login($this->user);
        return redirect(RouteServiceProvider::HOME);
    }

    protected function rules(): array
    {
        return [
            'user.name' => [
                'string',
                'required',
            ],
            'user.nis' => [
                'string',
                'required',
                'numeric',
                'unique:users,nis',
            ],
            'user.telepon' => [
                'string',
                'required',
                'numeric',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email',
            ],
            'user.universitas' => [
                'string',
                'required',
            ],
            'user.prodi' => [
                'string',
                'required',
            ],
            'user.angkatan_ppm' => [
                'integer',
                'min:2011',
                'max:2147483647',
                'required',
            ],
            'user.angkatan_kuliah' => [
                'integer',
                'min:2000',
                'max:2147483647',
                'required',
            ],
            'user.daerah' => [
                'string',
                'required',
            ],
            'user.desa' => [
                'string',
                'required',
            ],
            'user.kelompok' => [
                'string',
                'required',
            ],
            'provinsi' => [
                'exists:provinsis,id',
                'required',
            ],
            'kabupaten' => [
                'exists:kabupatens,id',
                'required',
            ],
            'kecamatan' => [
                'exists:kecamatans,id',
                'required',
            ],
            'kelurahan' => [
                'exists:kelurahans,id',
                'required',
            ],
            'user.alamat' => [
                'string',
                'required',
            ],
            'password' => [
                'min:8',
                'string',
                'required',
            ],
            'konfirmasi_password' => [
                'min:8',
                'string',
                'required',
                'same:password'
            ],
        ];
    }

    public function updatedProvinsi($provinsi)
    {
        $this->semuaKabupaten = Kabupaten::where('provinsi_id', $provinsi)->get();
        $this->kabupaten = null;
        $this->kecamatan = null;
        $this->kelurahan = null;
    }

    public function updatedKabupaten($kabupaten)
    {
        if ($kabupaten != null) {
            $this->semuaKecamatan = Kecamatan::where('kabupaten_id', $kabupaten)->get();
            $this->kecamatan = null;
            $this->kelurahan = null;
        }
    }

    public function updatedKecamatan($kecamatan)
    {
        if ($kecamatan != null) {
            $this->semuaKelurahan = Kelurahan::where('kecamatan_id', $kecamatan)->get();
            $this->kelurahan = null;
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
