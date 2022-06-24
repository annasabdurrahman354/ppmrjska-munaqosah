<?php

namespace App\Http\Livewire\Admin\PlotMunaqosah;

use App\Models\JadwalMunaqosah;
use App\Models\PlotMunaqosah;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public PlotMunaqosah $plotMunaqosah;

    public function mount(PlotMunaqosah $plotMunaqosah)
    {
        $this->plotMunaqosah = $plotMunaqosah;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.plot-munaqosah.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->plotMunaqosah->save();

        return redirect()->route('admin.plot-munaqosah.index');
    }

    protected function rules(): array
    {
        return [
            'plotMunaqosah.jadwal_munaqosah_id' => [
                'integer',
                'exists:jadwal_munaqosahs,id',
                'required',
            ],
            'plotMunaqosah.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['jadwal_munaqosah'] = JadwalMunaqosah::all()->pluck('full_jadwal', 'id')->toArray();
        $this->listsForFields['user']             = User::all()->pluck('full_nama', 'id')->toArray();
    }
}