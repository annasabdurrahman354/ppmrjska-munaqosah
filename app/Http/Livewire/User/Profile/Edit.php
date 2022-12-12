<?php

namespace App\Http\Livewire\User\Profile;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    public User $user;

    public $provinsi = null;
    public $kabupaten = null;

    public $semuaProvinsi;
    public $semuaKabupaten;

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public function mount()
    {
        $this->user  = Auth::user();
        $this->initListsForFields();
        $this->semuaProvinsi = Provinsi::all();
        $this->provinsi = $this->user->provinsi_id;
        
        $this->semuaKabupaten = collect();
        $this->kabupaten = $this->user->kabupaten_id;
        $this->semuaKabupaten = Kabupaten::where('provinsi_id', $this->user->provinsi_id)->get();
    }

    public function render()
    {
        return view('livewire.user.profile.edit');
    }

    public function submit()
    {
        $this->validate();
        $this->user->password = $this->password;
        $this->user->provinsi_id = $this->provinsi;
        $this->user->kabupaten_id = $this->kabupaten;
        $this->user->save();

        return redirect()->route('user.profile.index');
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
                'unique:users,nis,' . $this->user->id,
            ],
            'user.telepon' => [
                'string',
                'required',
                'numeric',
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
            'user.alamat' => [
                'string',
                'required',
            ],
            'password' => [
                'string',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['jenis_kelamin'] = $this->user::JENIS_KELAMIN_SELECT;
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