<?php

namespace App\Http\Livewire\Admin\JadwalMunaqosah;

use App\Models\DewanGuru;
use App\Models\JadwalMunaqosah;
use App\Models\MateriMunaqosah;
use Livewire\Component;

class Create extends Component
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
        return view('livewire.admin.jadwal-munaqosah.create');
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
        $this->listsForFields['materi']     = MateriMunaqosah::all()->pluck('full_materi', 'id')->toArray();
        $this->listsForFields['dewan_guru'] = DewanGuru::pluck('name', 'id')->toArray();
    }
}