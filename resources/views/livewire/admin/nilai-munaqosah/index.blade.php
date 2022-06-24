<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('nilai_munaqosah_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/Admin/ExcelExport.php')))
                <livewire:admin.excel-export model="NilaiMunaqosah" format="csv" />
                <livewire:admin.excel-export model="NilaiMunaqosah" format="xlsx" />
                <livewire:admin.excel-export model="NilaiMunaqosah" format="pdf" />
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
                            {{ trans('cruds.nilaiMunaqosah.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.nilaiMunaqosah.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.nilaiMunaqosah.fields.jadwal_munaqosah') }}
                            @include('components.table.sort', ['field' => 'jadwal_munaqosah.sesi'])
                        </th>
                        <th>
                            {{ trans('cruds.nilaiMunaqosah.fields.materi_munaqosah') }}
                            @include('components.table.sort', ['field' => 'materi_munaqosah.materi'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.keterangan') }}
                            @include('components.table.sort', ['field' => 'materi_munaqosah.keterangan'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.jenis') }}
                            @include('components.table.sort', ['field' => 'materi_munaqosah.jenis'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.angkatan') }}
                            @include('components.table.sort', ['field' => 'materi_munaqosah.angkatan'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.tahun_pelajaran') }}
                            @include('components.table.sort', ['field' => 'materi_munaqosah.tahun_pelajaran'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.semester') }}
                            @include('components.table.sort', ['field' => 'materi_munaqosah.semester'])
                        </th>
                        <th>
                            {{ trans('cruds.nilaiMunaqosah.fields.dewan_guru') }}
                            @include('components.table.sort', ['field' => 'dewan_guru.name'])
                        </th>
                        <th>
                            {{ trans('cruds.nilaiMunaqosah.fields.nilai_bacaan') }}
                            @include('components.table.sort', ['field' => 'nilai_bacaan'])
                        </th>
                        <th>
                            {{ trans('cruds.nilaiMunaqosah.fields.nilai_pemahaman') }}
                            @include('components.table.sort', ['field' => 'nilai_pemahaman'])
                        </th>
                        <th>
                            {{ trans('cruds.nilaiMunaqosah.fields.nilai_kelengkapan') }}
                            @include('components.table.sort', ['field' => 'nilai_kelengkapan'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nilaiMunaqosahs as $nilaiMunaqosah)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $nilaiMunaqosah->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $nilaiMunaqosah->id }}
                            </td>
                            <td>
                                @if($nilaiMunaqosah->user)
                                    <span class="badge badge-relationship">{{ $nilaiMunaqosah->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($nilaiMunaqosah->jadwalMunaqosah)
                                    <span class="badge badge-relationship">{{ $nilaiMunaqosah->jadwalMunaqosah->sesi ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($nilaiMunaqosah->materiMunaqosah)
                                    <span class="badge badge-relationship">{{ $nilaiMunaqosah->materiMunaqosah->materi ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($nilaiMunaqosah->materiMunaqosah)
                                    {{ $nilaiMunaqosah->materiMunaqosah->keterangan ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($nilaiMunaqosah->materiMunaqosah)
                                    {{ $nilaiMunaqosah->materiMunaqosah->jenis_label }}
                                @endif
                            </td>
                            <td>
                                @if($nilaiMunaqosah->materiMunaqosah)
                                    {{ $nilaiMunaqosah->materiMunaqosah->angkatan ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($nilaiMunaqosah->materiMunaqosah)
                                    {{ $nilaiMunaqosah->materiMunaqosah->tahun_pelajaran ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($nilaiMunaqosah->materiMunaqosah)
                                    {{ $nilaiMunaqosah->materiMunaqosah->semester ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($nilaiMunaqosah->dewanGuru)
                                    <span class="badge badge-relationship">{{ $nilaiMunaqosah->dewanGuru->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $nilaiMunaqosah->nilai_bacaan }}
                            </td>
                            <td>
                                {{ $nilaiMunaqosah->nilai_pemahaman }}
                            </td>
                            <td>
                                {{ $nilaiMunaqosah->nilai_kelengkapan }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('nilai_munaqosah_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.nilai-munaqosah.show', $nilaiMunaqosah) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('nilai_munaqosah_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.nilai-munaqosah.edit', $nilaiMunaqosah) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('nilai_munaqosah_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $nilaiMunaqosah->id }})" wire:loading.attr="disabled">
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
            {{ $nilaiMunaqosahs->links() }}
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