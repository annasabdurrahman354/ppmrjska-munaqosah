<?php

namespace App\Http\Livewire\Admin\User;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
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

    public int $perPage;

    public int $countEmptyPasswords;
    public string $usersJson = '';

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'name',
        ],
        'sortDirection' => [
            'except' => 'asc',
        ],
    ];

    public function setEmptyPasswords()
    {
        $usersArray = json_decode($this->usersJson, true);
        foreach($usersArray as $value) {
            $user = User::where('nis', $value['nis'])->first();
            $user->password = bcrypt($value['password']);
            $user->save();
        }
        $this->resetPage();
    }

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
        $this->countEmptyPasswords = User::where('password', '')->get()->count();
        $this->sortBy            = 'name';
        $this->sortDirection     = 'asc';
        $this->perPage           = 50;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new User())->orderable;
    }

    public function render()
    {
        $query = User::with(['provinsi', 'kabupaten', 'roles'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $users = $query->paginate($this->perPage);

        return view('livewire.admin.user.index', compact('query', 'users'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        User::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
    }
}