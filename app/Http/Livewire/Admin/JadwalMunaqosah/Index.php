<?php

namespace App\Http\Livewire\Admin\JadwalMunaqosah;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\JadwalMunaqosah;
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
            'except' => 'sesi',
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
        $this->sortBy            = 'sesi';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new JadwalMunaqosah())->orderable;
    }

    public function render()
    {
        $query = JadwalMunaqosah::with(['materi', 'dewanGuru'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $jadwalMunaqosahs = $query->paginate($this->perPage);

        return view('livewire.admin.jadwal-munaqosah.index', compact('jadwalMunaqosahs', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('jadwal_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        JadwalMunaqosah::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(JadwalMunaqosah $jadwalMunaqosah)
    {
        abort_if(Gate::denies('jadwal_munaqosah_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jadwalMunaqosah->delete();
    }
}