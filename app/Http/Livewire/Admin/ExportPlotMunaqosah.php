<?php

namespace App\Http\Livewire\Admin;

use App\Models\MateriMunaqosah;
use App\Models\PlotMunaqosah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ExportPlotMunaqosah extends Component
{   
    protected $debug = true;
    public $selectedUser = [];
    public $plotMunaqosahBaru = null;
    public $semuaJadwalMunaqosah;
    public $isAddPlotBaru =  false;
    public $isIngatkanMunaqosah =  false;

    public array $listsForFields = [];

    public function mount(){
        $this->semuaJadwalMunaqosah = MateriMunaqosah::whereHas('jadwalMunaqosahs', function ($q) {
            $q->whereDate('sesi', '>=', now());
        })
        ->with(['jadwalMunaqosahs' => function ($query) {
            $query->whereDate('sesi', '>=', now())->with(['plots.user' => function ($query) {
                $query->select('id', 'name', 'telepon');
            }]);
        }])
        ->get()
        ->groupBy('angkatan')
        ->map(function ($group) {
            return $group->sortBy('angkatan')->map(function ($materiMunaqosah) {
                $materiMunaqosah->dewan_guru = $materiMunaqosah->getDewanGuruAttribute();
                return $materiMunaqosah;
            });
        });

        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.admin.plot-munaqosah-export',  ['semuaJadwalMunaqosah' => json_encode($this->semuaJadwalMunaqosah->toArray())])->layout('layouts.blank');
    }

    public function toggleIsIngatkanMunaqosah()
    {
        if ($this->isIngatkanMunaqosah == false){
            $this->isIngatkanMunaqosah = true;
        }
        else {
            return redirect()->route('admin.kelola.plot-munaqosah');
        }
    }

    public function toggleIsAddPlotBaru()
    {
        if ($this->isAddPlotBaru == false){
            $this->isAddPlotBaru = true;
        }
        else {
            return redirect()->route('admin.kelola.plot-munaqosah');
        }
    }

    public function addPlotBaru($angkatan, $materiId, $jadwalMunaqosahId, $index)
    {
        $userKey = $this->selectedUser[$angkatan][$materiId][$jadwalMunaqosahId][$index];
        $this->plotMunaqosahBaru[] = [
            "jadwal_munaqosah_id" => $jadwalMunaqosahId,
            "user_id" => $userKey,
        ];
    }

    public function savePlotBaru(){
        foreach ($this->plotMunaqosahBaru as $plot) {
            PlotMunaqosah::create($plot);
        }
        return redirect()->route('admin.kelola.plot-munaqosah');
    }

    protected function initListsForFields(): void
    {
        $semuaAngkatan = array_keys($this->semuaJadwalMunaqosah->toArray());
        foreach ($semuaAngkatan as $angkatan){
            $semuaMateriAngkatan = collect($this->semuaJadwalMunaqosah[$angkatan])->pluck('id')->unique();
            foreach ($semuaMateriAngkatan as $materi){
                $this->listsForFields['user'][$angkatan][$materi] = User::whereDoesntHave('plots.jadwal_munaqosah', function (Builder $query) use ($materi){
                    $query->where('materi_id', $materi);
                })->where('angkatan_ppm', $angkatan)->get()->pluck('nama_pluck', 'id')->toArray();
            }  
        }
    }
}