<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public User $user;

    public $provinsi = null;
    public $kabupaten = null;
    public $kecamatan = null;
    public $kelurahan = null;

    public $semuaProvinsi;
    public $semuaKabupaten;
    public $semuaKecamatan;
    public $semuaKelurahan;

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->roles = $this->user->roles()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->semuaProvinsi = Provinsi::all();
        $this->provinsi = $this->user->provinsi_id;
        
        $this->semuaKabupaten = collect();
        $this->semuaKecamatan = collect();
        $this->semuaKelurahan = collect();

       
        $this->kabupaten = $this->user->kabupaten_id;
        $this->kecamatan = $this->user->kecamatan_id;
        $this->kelurahan = $this->user->kelurahan_id;

        $this->semuaKabupaten = Kabupaten::where('provinsi_id', $this->user->provinsi_id)->get();
        $this->semuaKecamatan = Kecamatan::where('kabupaten_id', $this->user->kabupaten_id)->get();
        $this->semuaKelurahan= Kelurahan::where('kecamatan_id', $this->user->kecamatan_id)->get();
    }

    public function render()
    {
        return view('livewire.admin.user.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->provinsi_id = $this->provinsi;
        $this->user->kabupaten_id = $this->kabupaten;
        $this->user->kecamatan_id = $this->kecamatan;
        $this->user->kelurahan_id = $this->kelurahan;
        $this->user->save();
        $this->user->roles()->sync($this->roles);

        return redirect()->route('admin.users.index');
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
                'unique:users,nis,' . $this->user->id,
            ],
            'user.telepon' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . $this->user->id,
            ],
            'user.jenis_kelamin' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['jenis_kelamin'])),
            ],
            'user.universitas' => [
                'string',
                'nullable',
            ],
            'user.prodi' => [
                'string',
                'nullable',
            ],
            'user.angkatan_ppm' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'user.angkatan_kuliah' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
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
            'user.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'user.locale' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['jenis_kelamin'] = $this->user::JENIS_KELAMIN_SELECT;
        $this->listsForFields['status']        = $this->user::STATUS_SELECT;
        $this->listsForFields['roles']         = Role::pluck('title', 'id')->toArray();
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