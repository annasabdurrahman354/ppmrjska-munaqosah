<?php

namespace App\Http\Livewire\User;

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

    public array $roles = [];

    public string $password = '';

    public array $listsForFields = [];

    public function mount(User $user)
    {
        $this->user  = $user;
        $this->roles = $this->user->roles()->pluck('id')->toArray();
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.user.edit');
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
        $this->listsForFields['provinsi']      = Provinsi::pluck('name', 'id')->toArray();
        $this->listsForFields['kabupaten']     = Kabupaten::pluck('name', 'id')->toArray();
        $this->listsForFields['kecamatan']     = Kecamatan::pluck('name', 'id')->toArray();
        $this->listsForFields['kelurahan']     = Kelurahan::pluck('name', 'id')->toArray();
        $this->listsForFields['status']        = $this->user::STATUS_SELECT;
        $this->listsForFields['roles']         = Role::pluck('title', 'id')->toArray();
    }
}