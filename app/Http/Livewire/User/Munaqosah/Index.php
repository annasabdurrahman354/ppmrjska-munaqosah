<?php

namespace App\Http\Livewire\User\Munaqosah;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\PlotMunaqosah;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public User $user;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

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

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->user = auth()->user(); 
        $this->sortBy            = 'jadwal_munaqosah.sesi';
        $this->sortDirection     = 'asc';
        $this->perPage           = 10;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new PlotMunaqosah())->orderable;
    }

    public function render()
    {
        $query = PlotMunaqosah::with(['jadwalMunaqosah', 'user'])->whereRelation('user', 'id', $this->user->id)->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $plotMunaqosahs = $query->paginate($this->perPage);

        return view('livewire.user.munaqosah.index', compact('plotMunaqosahs', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('plot_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        PlotMunaqosah::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(PlotMunaqosah $plotMunaqosah)
    {
        abort_if(Gate::denies('plot_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $plotMunaqosah->delete();
    }
}