<?php

namespace App\Http\Livewire\Admin\Kelurahan;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Kelurahan;
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
            'except' => 'id',
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
        $this->sortBy            = 'id';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Kelurahan())->orderable;
    }

    public function render()
    {
        $query = Kelurahan::with(['kecamatan'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $kelurahans = $query->paginate($this->perPage);

        return view('livewire.admin.kelurahan.index', compact('kelurahans', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('kelurahan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Kelurahan::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Kelurahan $kelurahan)
    {
        abort_if(Gate::denies('kelurahan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kelurahan->delete();
    }
}