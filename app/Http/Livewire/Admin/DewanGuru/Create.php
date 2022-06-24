<?php

namespace App\Http\Livewire\Admin\DewanGuru;

use App\Models\DewanGuru;
use Livewire\Component;

class Create extends Component
{
    public DewanGuru $dewanGuru;

    public function mount(DewanGuru $dewanGuru)
    {
        $this->dewanGuru = $dewanGuru;
    }

    public function render()
    {
        return view('livewire.admin.dewan-guru.create');
    }

    public function submit()
    {
        $this->validate();

        $this->dewanGuru->save();

        return redirect()->route('admin.dewan-guru.index');
    }

    protected function rules(): array
    {
        return [
            'dewanGuru.name' => [
                'string',
                'required',
            ],
            'dewanGuru.telepon' => [
                'string',
                'nullable',
            ],
            'dewanGuru.alamat' => [
                'string',
                'nullable',
            ],
        ];
    }
}