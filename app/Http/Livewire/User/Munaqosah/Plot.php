<?php

namespace App\Http\Livewire\User\Munaqosah;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\JadwalMunaqosah;
use App\Models\PlotMunaqosah;
use App\Models\NilaiMunaqosah;
use App\Models\User;
use Illuminate\Http\Response;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Plot extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public JadwalMunaqosah $jadwalMunaqosah;
    public User $user;

    public array $orderable;

    protected $queryString = [
        'sortBy' => [
            'except' => 'jadwal_munaqosah.sesi',
        ],
        'sortDirection' => [
            'except' => 'asc',
        ],
    ];

    public function mount(JadwalMunaqosah $jadwalMunaqosah)
    {
        $this->user = auth()->user();    
        $this->jadwalMunaqosah = $jadwalMunaqosah;
        $this->sortBy            = 'jadwal_munaqosah.sesi';
        $this->sortDirection     = 'asc';
        $this->orderable         = (new PlotMunaqosah())->orderable;
    }

    public function render()
    {
        $taken = false;
        if($this->user->telahAmbilMateriMunaqosah($this->jadwalMunaqosah->materi->id)){
            $taken = true;
        }

        $full = false;
        if($this->jadwalMunaqosah->plots_count >= $this->jadwalMunaqosah->maks_santri){
            $full = true;
        }

        $angkatan = false;
        if($this->jadwalMunaqosah->materi->angkatan === $this->user->angkatan_ppm){
            $angkatan = true;
        }

        $lewat = false;
        $sesi = Carbon::createFromFormat('d/m/Y H:i:s', ($this->jadwalMunaqosah->sesi));
        $sekarang = now();
        if($sesi->lt($sekarang)){
            $lewat = true;
        }

        $query = PlotMunaqosah::with(['jadwalMunaqosah', 'user'])->where('jadwal_munaqosah_id', "=", $this->jadwalMunaqosah->id)->advancedFilter([
            's'               => null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $plotMunaqosahs = $query->get();

        return view('livewire.user.munaqosah.plot', compact('plotMunaqosahs', 'query', 'taken', 'full', 'angkatan', 'lewat'));
    }

    public function ambilJadwal()
    {

        $newJadwalMunaqosah = JadwalMunaqosah::where('id', $this->jadwalMunaqosah->id)->first();
        if($newJadwalMunaqosah->plots_count >= $newJadwalMunaqosah->maks_santri){
            return redirect(request()->header('Referer'));
        }

        $plotMunaqosah = PlotMunaqosah::create([
            'jadwal_munaqosah_id' => $this->jadwalMunaqosah->id,
            'user_id' => $this->user->id,
        ]);
        
        $plotMunaqosah->save();
        return redirect()->route('user.munaqosah.index');
    }
}