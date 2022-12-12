<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
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
                        <th>
                            {{ trans('cruds.plotMunaqosah.fields.jadwal_munaqosah') }}
                            @include('components.table.sort', ['field' => 'jadwal_munaqosah.sesi'])
                        </th>
                        <th>
                            {{ trans('cruds.plotMunaqosah.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        
                        <th>
                            {{ trans('cruds.jadwalMunaqosah.fields.materi') }}
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.keterangan') }}
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.jenis') }}
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.hafalan') }}
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.tahun_pelajaran') }}
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.semester') }}
                        </th>
                        <th>
                            {{ trans('cruds.jadwalMunaqosah.fields.dewan_guru') }}
                        </th>


                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($plotMunaqosahs as $plotMunaqosah)
                        <tr>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah)
                                    <span class="badge badge-relationship">{{ $plotMunaqosah->jadwalMunaqosah->sesi ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->user)
                                    <span class="badge badge-relationship">{{ $plotMunaqosah->user->name ?? '' }}</span>
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
                                    @if (\Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $plotMunaqosah->jadwalMunaqosah->sesi)->gt(now()->addHours(24)) && false)
                                    <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $plotMunaqosah->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                    </button>
                                    @endif
                                    
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
            {{ $plotMunaqosahs->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
Livewire.on('confirm', e => {
    if (!confirm("Pastikan jadwal munaqosah belum terlaksana! Anda yakin?")) {
        return
    }
    @this[e.callback](...e.argv)
})
    </script>
@endpush

{{-- \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $plotMunaqosah->jadwalMunaqosah->sesi)->gt(now()) --}}
