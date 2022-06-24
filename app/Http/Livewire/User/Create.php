<?php

namespace App\Http\Livewire\User;

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

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.user.create');
    }

    public function submit()
    {
        $this->validate();
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
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'user.angkatan_kuliah' => [
                'integer',
                'min:-2147483648',
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
            'user.provinsi_id' => [
                'integer',
                'exists:provinsis,id',
                'required',
            ],
            'user.kabupaten_id' => [
                'integer',
                'exists:kabupatens,id',
                'required',
            ],
            'user.kecamatan_id' => [
                'integer',
                'exists:kecamatans,id',
                'required',
            ],
            'user.kelurahan_id' => [
                'integer',
                'exists:kelurahans,id',
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
        $this->listsForFields['provinsi']  = Provinsi::pluck('name', 'id')->toArray();
        $this->listsForFields['kabupaten'] = Kabupaten::pluck('name', 'id')->toArray();
        $this->listsForFields['kecamatan'] = Kecamatan::pluck('name', 'id')->toArray();
        $this->listsForFields['kelurahan'] = Kelurahan::pluck('name', 'id')->toArray();
        $this->listsForFields['roles']     = Role::pluck('title', 'id')->toArray();
    }
}