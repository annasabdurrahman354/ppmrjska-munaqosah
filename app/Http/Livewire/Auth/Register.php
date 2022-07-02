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

    public $semuaJenisKelamin;
    public $semuaProvinsi;
    public $semuaKabupaten;

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
        $this->semuaJenisKelamin = $this->user::JENIS_KELAMIN_SELECT;
        $this->semuaProvinsi = Provinsi::all();
        $this->semuaKabupaten = collect();
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
            'user.jenis_kelamin' => [
                'required',
                'in:' . implode(',', array_keys($this->semuaJenisKelamin)),
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
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
