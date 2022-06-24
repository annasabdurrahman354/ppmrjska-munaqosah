<?php

namespace App\Http\Livewire\Admin\Kabupaten;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Kabupaten;
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
        $this->orderable         = (new Kabupaten())->orderable;
    }

    public function render()
    {
        $query = Kabupaten::with(['provinsi'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $kabupatens = $query->paginate($this->perPage);

        return view('livewire.admin.kabupaten.index', compact('kabupatens', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('kabupaten_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Kabupaten::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Kabupaten $kabupaten)
    {
        abort_if(Gate::denies('kabupaten_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kabupaten->delete();
    }
}