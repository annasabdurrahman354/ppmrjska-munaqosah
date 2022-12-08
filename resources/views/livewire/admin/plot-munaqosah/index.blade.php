<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('plot_munaqosah_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/Admin/ExcelExport.php')))
                <livewire:admin.excel-export model="PlotMunaqosah" format="xlsx" />
                <livewire:admin.excel-export model="PlotMunaqosah" format="pdf" />
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
                            {{ trans('cruds.plotMunaqosah.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.plotMunaqosah.fields.jadwal_munaqosah') }}
                            @include('components.table.sort', ['field' => 'jadwal_munaqosah.sesi'])
                        </th>



                        <th>
                            {{ trans('cruds.plotMunaqosah.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.angkatan_ppm') }}
                            @include('components.table.sort', ['field' => 'user.angkatan_ppm'])
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.jenis_kelamin') }}
                            @include('components.table.sort', ['field' => 'user.jenis_kelamin'])
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
                            {{ trans('cruds.materiMunaqosah.fields.hafalan') }}
                            @include('components.table.sort', ['field' => 'materi.hafalan'])
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
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($plotMunaqosahs as $plotMunaqosah)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $plotMunaqosah->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $plotMunaqosah->id }}
                            </td>
                            <td>
                                <a class="badge badge-relationship" href="{{ route('admin.jadwal-munaqosah.show', $plotMunaqosah->jadwalMunaqosah) }}">
                                    {{ $plotMunaqosah->jadwalMunaqosah->sesi ?? '' }}
                                </a>
                            </td>

                            <td>
                                @if($plotMunaqosah->user)
                                    <span class="badge badge-relationship">{{ $plotMunaqosah->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->user)
                                    {{ $plotMunaqosah->user->angkatan_ppm ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->user)
                                    {{ $plotMunaqosah->user->jenis_kelamin_label }}
                                @endif
                            </td>


                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    <span class="badge badge-relationship">{{ $plotMunaqosah->jadwalMunaqosah->materi->materi ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->keterangan ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->jenis_label }}
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->hafalan ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->angkatan ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->tahun_pelajaran ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->semester ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->dewanGuru)
                                    <span class="badge badge-relationship">{{ $plotMunaqosah->jadwalMunaqosah->dewanGuru->name ?? '' }}</span>
                                @endif
                            </td>

                            
                            <td>
                                <div class="flex justify-end">
                                    @can('plot_munaqosah_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.plot-munaqosah.show', $plotMunaqosah) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('plot_munaqosah_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.plot-munaqosah.edit', $plotMunaqosah) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('plot_munaqosah_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $plotMunaqosah->id }})" wire:loading.attr="disabled">
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
            {{ $plotMunaqosahs->links() }}
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