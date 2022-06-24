<?php

namespace App\Http\Livewire\Admin\Provinsi;

use App\Models\Provinsi;
use Livewire\Component;

class Create extends Component
{
    public Provinsi $provinsi;

    public function mount(Provinsi $provinsi)
    {
        $this->provinsi = $provinsi;
    }

    public function render()
    {
        return view('livewire.admin.provinsi.create');
    }

    public function submit()
    {
        $this->validate();

        $this->provinsi->save();

        return redirect()->route('admin.provinsis.index');
    }

    protected function rules(): array
    {
        return [
            'provinsi.name' => [
                'string',
                'required',
            ],
        ];
    }
}