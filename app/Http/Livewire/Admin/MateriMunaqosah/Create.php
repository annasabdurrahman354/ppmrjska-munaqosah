<?php

namespace App\Http\Livewire\Admin\MateriMunaqosah;

use App\Models\MateriMunaqosah;
use Livewire\Component;

class Create extends Component
{
    public array $listsForFields = [];

    public MateriMunaqosah $materiMunaqosah;

    public function mount(MateriMunaqosah $materiMunaqosah)
    {
        $this->materiMunaqosah = $materiMunaqosah;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.materi-munaqosah.create');
    }

    public function submit()
    {
        $this->validate();

        $this->materiMunaqosah->save();

        return redirect()->route('admin.materi-munaqosah.index');
    }

    protected function rules(): array
    {
        return [
            'materiMunaqosah.materi' => [
                'string',
                'required',
            ],
            'materiMunaqosah.jenis' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['jenis'])),
            ],
            'materiMunaqosah.keterangan' => [
                'string',
                'required',
            ],
            'materiMunaqosah.hafalan' => [
                'string',
                'required',
            ],
            'materiMunaqosah.angkatan' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'materiMunaqosah.tahun_pelajaran' => [
                'string',
                'required',
            ],
            'materiMunaqosah.semester' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['jenis'] = $this->materiMunaqosah::JENIS_SELECT;
    }
}