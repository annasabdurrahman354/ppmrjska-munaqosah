<?php

namespace App\Http\Livewire\Admin\NilaiMunaqosah;

use App\Models\DewanGuru;
use App\Models\JadwalMunaqosah;
use App\Models\MateriMunaqosah;
use App\Models\NilaiMunaqosah;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public NilaiMunaqosah $nilaiMunaqosah;

    public function mount(NilaiMunaqosah $nilaiMunaqosah)
    {
        $this->nilaiMunaqosah = $nilaiMunaqosah;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.nilai-munaqosah.create');
    }

    public function submit()
    {
        $this->validate();

        $this->nilaiMunaqosah->save();

        return redirect()->route('admin.nilai-munaqosah.index');
    }

    protected function rules(): array
    {
        return [
            'nilaiMunaqosah.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'nilaiMunaqosah.jadwal_munaqosah_id' => [
                'integer',
                'exists:jadwal_munaqosahs,id',
                'nullable',
            ],
            'nilaiMunaqosah.materi_munaqosah_id' => [
                'integer',
                'exists:materi_munaqosahs,id',
                'nullable',
            ],
            'nilaiMunaqosah.dewan_guru_id' => [
                'integer',
                'exists:dewan_gurus,id',
                'nullable',
            ],
            'nilaiMunaqosah.nilai_bacaan' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'nilaiMunaqosah.nilai_pemahaman' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'nilaiMunaqosah.nilai_kelengkapan' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']             = User::pluck('name', 'id')->toArray();
        $this->listsForFields['jadwal_munaqosah'] = JadwalMunaqosah::pluck('sesi', 'id')->toArray();
        $this->listsForFields['materi_munaqosah'] = MateriMunaqosah::pluck('materi', 'id')->toArray();
        $this->listsForFields['dewan_guru']       = DewanGuru::pluck('name', 'id')->toArray();
    }
}