<?php

namespace App\Http\Livewire\NilaiMunaqosah;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\NilaiMunaqosah;
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
            'except' => 'user.name',
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
        $this->sortBy            = 'user.name';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new NilaiMunaqosah())->orderable;
    }

    public function render()
    {
        $query = NilaiMunaqosah::with(['user', 'jadwalMunaqosah', 'materiMunaqosah', 'dewanGuru'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $nilaiMunaqosahs = $query->paginate($this->perPage);

        return view('livewire.nilai-munaqosah.index', compact('nilaiMunaqosahs', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('nilai_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        NilaiMunaqosah::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(NilaiMunaqosah $nilaiMunaqosah)
    {
        abort_if(Gate::denies('nilai_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nilaiMunaqosah->delete();
    }
}