<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('user_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="User" format="xlsx" />
                <livewire:excel-export model="User" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.user.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.nis') }}
                            @include('components.table.sort', ['field' => 'nis'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.telepon') }}
                            @include('components.table.sort', ['field' => 'telepon'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.jenis_kelamin') }}
                            @include('components.table.sort', ['field' => 'jenis_kelamin'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.universitas') }}
                            @include('components.table.sort', ['field' => 'universitas'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.prodi') }}
                            @include('components.table.sort', ['field' => 'prodi'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.angkatan_ppm') }}
                            @include('components.table.sort', ['field' => 'angkatan_ppm'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.angkatan_kuliah') }}
                            @include('components.table.sort', ['field' => 'angkatan_kuliah'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.daerah') }}
                            @include('components.table.sort', ['field' => 'daerah'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.desa') }}
                            @include('components.table.sort', ['field' => 'desa'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.kelompok') }}
                            @include('components.table.sort', ['field' => 'kelompok'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.provinsi') }}
                            @include('components.table.sort', ['field' => 'provinsi.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.kabupaten') }}
                            @include('components.table.sort', ['field' => 'kabupaten.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.kecamatan') }}
                            @include('components.table.sort', ['field' => 'kecamatan.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.kelurahan') }}
                            @include('components.table.sort', ['field' => 'kelurahan.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.alamat') }}
                            @include('components.table.sort', ['field' => 'alamat'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.status') }}
                            @include('components.table.sort', ['field' => 'status'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                            @include('components.table.sort', ['field' => 'email_verified_at'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.locale') }}
                            @include('components.table.sort', ['field' => 'locale'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $user->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->nis }}
                            </td>
                            <td>
                                {{ $user->telepon }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $user->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $user->email }}
                                </a>
                            </td>
                            <td>
                                {{ $user->jenis_kelamin_label }}
                            </td>
                            <td>
                                {{ $user->universitas }}
                            </td>
                            <td>
                                {{ $user->prodi }}
                            </td>
                            <td>
                                {{ $user->angkatan_ppm }}
                            </td>
                            <td>
                                {{ $user->angkatan_kuliah }}
                            </td>
                            <td>
                                {{ $user->daerah }}
                            </td>
                            <td>
                                {{ $user->desa }}
                            </td>
                            <td>
                                {{ $user->kelompok }}
                            </td>
                            <td>
                                @if($user->provinsi)
                                    <span class="badge badge-relationship">{{ $user->provinsi->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->kabupaten)
                                    <span class="badge badge-relationship">{{ $user->kabupaten->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->kecamatan)
                                    <span class="badge badge-relationship">{{ $user->kecamatan->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($user->kelurahan)
                                    <span class="badge badge-relationship">{{ $user->kelurahan->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $user->alamat }}
                            </td>
                            <td>
                                {{ $user->status_label }}
                            </td>
                            <td>
                                {{ $user->email_verified_at }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->locale }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('user_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.users.show', $user) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('user_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.users.edit', $user) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $users->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush