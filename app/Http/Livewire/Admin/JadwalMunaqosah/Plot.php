<?php

namespace App\Http\Livewire\Admin\JadwalMunaqosah;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\JadwalMunaqosah;
use App\Models\PlotMunaqosah;
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
        $this->jadwalMunaqosah = $jadwalMunaqosah;
        $this->sortBy            = 'jadwal_munaqosah.sesi';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new PlotMunaqosah())->orderable;
    }

    public function render()
    {
        $full = false;
        if($this->jadwalMunaqosah->plots_count >= $this->jadwalMunaqosah->maks_santri){
            $full = true;
        }

        $lewat = false;
        $sesi = Carbon::createFromFormat('d/m/Y H:i:s', ($this->jadwalMunaqosah->sesi));
        $sekarang = now();
        if($sesi->lt($sekarang)){
            $lewat = true;
        }

        $query = PlotMunaqosah::with(['jadwalMunaqosah', 'user'])->where('jadwal_munaqosah_id', "=", $this->jadwalMunaqosah->id)->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $plotMunaqosahs = $query->paginate($this->perPage);

        return view('livewire.admin.jadwal-munaqosah.plot', compact('plotMunaqosahs', 'query', 'full', 'lewat'));
    }

    public function delete(PlotMunaqosah $plotMunaqosah)
    {
        abort_if(Gate::denies('plot_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plotMunaqosah->delete();
    }
}