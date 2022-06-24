<?php

namespace App\Http\Livewire\Admin\MateriKbm;

use App\Models\MateriKbm;
use Livewire\Component;

class Edit extends Component
{
    public MateriKbm $materiKbm;

    public array $listsForFields = [];

    public function mount(MateriKbm $materiKbm)
    {
        $this->materiKbm = $materiKbm;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.materi-kbm.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->materiKbm->save();

        return redirect()->route('admin.materi-kbm.index');
    }

    protected function rules(): array
    {
        return [
            'materiKbm.materi' => [
                'string',
                'required',
            ],
            'materiKbm.jenis' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['jenis'])),
            ],
            'materiKbm.halaman' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['jenis'] = $this->materiKbm::JENIS_SELECT;
    }
}