<?php

namespace App\Http\Livewire\JadwalMunaqosah;

use App\Models\DewanGuru;
use App\Models\JadwalMunaqosah;
use App\Models\MateriMunaqosah;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public JadwalMunaqosah $jadwalMunaqosah;

    public function mount(JadwalMunaqosah $jadwalMunaqosah)
    {
        $this->jadwalMunaqosah = $jadwalMunaqosah;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.jadwal-munaqosah.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->jadwalMunaqosah->save();

        return redirect()->route('admin.jadwal-munaqosah.index');
    }

    protected function rules(): array
    {
        return [
            'jadwalMunaqosah.sesi' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'jadwalMunaqosah.keterangan' => [
                'string',
                'required',
            ],
            'jadwalMunaqosah.materi_id' => [
                'integer',
                'exists:materi_munaqosahs,id',
                'required',
            ],
            'jadwalMunaqosah.dewan_guru_id' => [
                'integer',
                'exists:dewan_gurus,id',
                'required',
            ],
            'jadwalMunaqosah.maks_santri' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['materi']     = MateriMunaqosah::pluck('materi', 'id')->toArray();
        $this->listsForFields['dewan_guru'] = DewanGuru::pluck('name', 'id')->toArray();
    }
}