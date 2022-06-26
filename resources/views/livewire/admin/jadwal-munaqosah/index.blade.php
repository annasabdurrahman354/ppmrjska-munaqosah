<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('jadwal_munaqosah_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/Admin/ExcelExport.php')))
                <livewire:admin.excel-export model="JadwalMunaqosah" format="xlsx" />
                <livewire:admin.excel-export model="JadwalMunaqosah" format="pdf" />
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
                            {{ trans('cruds.jadwalMunaqosah.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.jadwalMunaqosah.fields.sesi') }}
                            @include('components.table.sort', ['field' => 'sesi'])
                        </th>
                        <th>
                            {{ trans('cruds.jadwalMunaqosah.fields.materi') }}
                            @include('components.table.sort', ['field' => 'materi.materi'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.keterangan') }}
                            @include('components.table.sort', ['field' => 'materi.keterangan'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.jenis') }}
                            @include('components.table.sort', ['field' => 'materi.jenis'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.angkatan') }}
                            @include('components.table.sort', ['field' => 'materi.angkatan'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.tahun_pelajaran') }}
                            @include('components.table.sort', ['field' => 'materi.tahun_pelajaran'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.semester') }}
                            @include('components.table.sort', ['field' => 'materi.semester'])
                        </th>
                        <th>
                            {{ trans('cruds.jadwalMunaqosah.fields.dewan_guru') }}
                            @include('components.table.sort', ['field' => 'dewan_guru.name'])
                        </th>
                        <th>
                            {{ trans('cruds.jadwalMunaqosah.fields.maks_santri') }}
                            @include('components.table.sort', ['field' => 'maks_santri'])
                        </th>
                        <th>
                            Pendaftar
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwalMunaqosahs as $jadwalMunaqosah)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $jadwalMunaqosah->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $jadwalMunaqosah->id }}
                            </td>
                            <td>
                                {{ $jadwalMunaqosah->sesi }}
                            </td>
                            <td>
                                @if($jadwalMunaqosah->materi)
                                    <span class="badge badge-relationship">{{ $jadwalMunaqosah->materi->materi ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($jadwalMunaqosah->materi)
                                    {{ $jadwalMunaqosah->materi->keterangan ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($jadwalMunaqosah->materi)
                                    {{ $jadwalMunaqosah->materi->jenis_label }}
                                @endif
                            </td>
                            <td>
                                @if($jadwalMunaqosah->materi)
                                    {{ $jadwalMunaqosah->materi->angkatan ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($jadwalMunaqosah->materi)
                                    {{ $jadwalMunaqosah->materi->tahun_pelajaran ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($jadwalMunaqosah->materi)
                                    {{ $jadwalMunaqosah->materi->semester ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($jadwalMunaqosah->dewanGuru)
                                    <span class="badge badge-relationship">{{ $jadwalMunaqosah->dewanGuru->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $jadwalMunaqosah->maks_santri }}
                            </td>
                            <td>
                                {{ $jadwalMunaqosah->plots_count }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('jadwal_munaqosah_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.jadwal-munaqosah.show', $jadwalMunaqosah) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('jadwal_munaqosah_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.jadwal-munaqosah.edit', $jadwalMunaqosah) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('jadwal_munaqosah_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $jadwalMunaqosah->id }})" wire:loading.attr="disabled">
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
            {{ $jadwalMunaqosahs->links() }}
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