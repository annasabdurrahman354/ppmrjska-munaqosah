<?php

namespace App\Http\Livewire\Admin\Kabupaten;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Livewire\Component;

class Edit extends Component
{
    public Kabupaten $kabupaten;

    public array $listsForFields = [];

    public function mount(Kabupaten $kabupaten)
    {
        $this->kabupaten = $kabupaten;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.kabupaten.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->kabupaten->save();

        return redirect()->route('admin.kabupatens.index');
    }

    protected function rules(): array
    {
        return [
            'kabupaten.provinsi_id' => [
                'integer',
                'exists:provinsis,id',
                'required',
            ],
            'kabupaten.name' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['provinsi'] = Provinsi::pluck('name', 'id')->toArray();
    }
}