<?php

namespace App\Http\Livewire\Admin\MateriMunaqosah;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\JadwalMunaqosah;
use App\Models\MateriMunaqosah;
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

    public MateriMunaqosah $materiMunaqosah;

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

    public function mount(MateriMunaqosah $materiMunaqosah)
    {
        $this->materiMunaqosah   = $materiMunaqosah;
        $this->sortBy            = 'jadwal_munaqosah.sesi';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new PlotMunaqosah())->orderable;
    }

    public function render()
    {
        $query = PlotMunaqosah::whereRelation('jadwalMunaqosah', 'materi_id', '=', $this->materiMunaqosah->id)->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $plotMunaqosahs = $query->paginate($this->perPage);

        return view('livewire.admin.materi-munaqosah.plot', compact('plotMunaqosahs', 'query'));
    }

}