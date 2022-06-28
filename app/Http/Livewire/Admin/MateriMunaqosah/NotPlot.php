<?php

namespace App\Http\Livewire\Admin\MateriMunaqosah;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\User;
use App\Models\JadwalMunaqosah;
use App\Models\MateriMunaqosah;
use App\Models\PlotMunaqosah;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class NotPlot extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public MateriMunaqosah $materiMunaqosah;

    public int $perPage;

    public array $orderable;

    public array $paginationOptions;

    protected $queryString = [
        'sortBy' => [
            'except' => 
            [
                'name'.
                'universitas',
                'prodi',
                'angkatan_kuliah',
                'daerah',
                'desa',
                'kelompok',
                'provinsi.name',
                'kabupaten.name',
                'kecamatan.name',
                'kelurahan.name',
                'alamat',
                'status',
                'email_verified_at',
                'roles.title',
                'locale',
            ],
        ],
        'sortDirection' => [
            'except' => 'asc',
        ],
    ];

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function mount(MateriMunaqosah $materiMunaqosah)
    {
        $this->materiMunaqosah   = $materiMunaqosah;
        $this->sortBy            = 'name';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new User())->orderable;
    }

    public function render()
    {
        $query = User::whereDoesntHave('plots.jadwal_munaqosah', function (Builder $query) {
            $query->where('materi_id', $this->materiMunaqosah->id);
        })->where('angkatan_ppm', $this->materiMunaqosah->angkatan)->advancedFilter([
            's'               => null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $users = $query->paginate($this->perPage);

        return view('livewire.admin.materi-munaqosah.not-plot', compact('query', 'users'));
    }
}