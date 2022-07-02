<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public User $user;

    public $provinsi = null;
    public $kabupaten = null;

    public $semuaProvinsi;
    public $semuaKabupaten;

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->initListsForFields();

        $this->semuaProvinsi = Provinsi::all();
        $this->semuaKabupaten = collect();
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }

    public function submit()
    {
        $this->validate();
        $this->user->provinsi_id = $this->provinsi;
        $this->user->kabupaten_id = $this->kabupaten;
        $this->user->password = $this->password;
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
                'unique:users,nis',
            ],
            'user.telepon' => [
                'string',
                'required',
            ],
            'user.email' => [
                'email:rfc',
                'required',
                'unique:users,email',
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
                'required',
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
        $this->listsForFields['roles']         = Role::pluck('title', 'id')->toArray();
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