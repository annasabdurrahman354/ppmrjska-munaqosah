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

class Plot extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public JadwalMunaqosah $jadwalMunaqosah;
    public User $user;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'jadwal_munaqosah.sesi',
        ],
        'sortDirection' => [
            'except' => 'asc',
        ],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function mount(JadwalMunaqosah $jadwalMunaqosah)
    {
        $this->user = auth()->user();    
        $this->jadwalMunaqosah = $jadwalMunaqosah;
        $this->sortBy            = 'jadwal_munaqosah.sesi';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
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
        $sesi = strtotime($this->jadwalMunaqosah->sesi);
        $sekarang = date('Y-m-d H:i:s');
        if($sesi > $sekarang){
            $lewat = true;
        }

        $query = PlotMunaqosah::with(['jadwalMunaqosah', 'user'])->where('jadwal_munaqosah_id', "=", $this->jadwalMunaqosah->id)->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $plotMunaqosahs = $query->paginate($this->perPage);

        return view('livewire.user.munaqosah.plot', compact('plotMunaqosahs', 'query', 'taken', 'full', 'angkatan', 'lewat'));
    }

    public function ambilJadwal()
    {
        $plotMunaqosah = PlotMunaqosah::create([
            'jadwal_munaqosah_id' => $this->jadwalMunaqosah->id,
            'user_id' => $this->user->id,
        ]);
        $plotMunaqosah->save();
        return redirect()->route('user.munaqosah.index');
    }
}