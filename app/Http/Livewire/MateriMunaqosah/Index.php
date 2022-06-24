<?php

namespace App\Http\Livewire\MateriMunaqosah;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\MateriMunaqosah;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

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
            'except' => 'materi',
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
        $this->sortBy            = 'materi';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new MateriMunaqosah())->orderable;
    }

    public function render()
    {
        $query = MateriMunaqosah::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $materiMunaqosahs = $query->paginate($this->perPage);

        return view('livewire.materi-munaqosah.index', compact('materiMunaqosahs', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('materi_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        MateriMunaqosah::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(MateriMunaqosah $materiMunaqosah)
    {
        abort_if(Gate::denies('materi_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materiMunaqosah->delete();
    }
}