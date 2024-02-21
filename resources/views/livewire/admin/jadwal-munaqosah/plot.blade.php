<div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
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
                            {{ trans('cruds.jadwalMunaqosah.fields.materi') }}
                            @include('components.table.sort', ['field' => 'materi.materi'])
                        </th>
                        <th>
                            {{ trans('cruds.materiMunaqosah.fields.keterangan') }}
                            @include('components.table.sort', ['field' => 'materi.keterangan'])
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
                            {{ trans('cruds.materiMunaqosah.fields.semester') }}
                            @include('components.table.sort', ['field' => 'materi.semester'])
                        </th>
  
                        <th>
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @forelse($plotMunaqosahs as $plotMunaqosah)
                        <tr>
                            <td>
                                {{ $plotMunaqosah->id }}
                            </td>
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
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->hafalan }}
                                @endif
                            </td>
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->angkatan ?? '' }}
                                @endif
                            </td>
                            
                            <td>
                                @if($plotMunaqosah->jadwalMunaqosah->materi)
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->semester ?? '' }}
                                @endif
                            </td>
                

                            <td>
                                <div class="flex justify-end">
                                        <a class="btn btn-sm btn-success mr-2" href="{{ $plotMunaqosah->user->ingatkanMunaqosah($plotMunaqosah->jadwalMunaqosah) }}">
                                            Ingatkan
                                        </a>
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
                            <td colspan="10">Sesi munaqosah masih kosong!</td>
                        </tr>
                    @endforelse

                    @if(!$full)
                        <tr>
                            <td colspan="10" class="">Kuota sesi munaqosah masih ada!</td>
                        </tr>
                    @endif

                    @if($full)
                        <tr>
                            <td colspan="10" class="">Kuota sesi munaqosah penuh!</td>
                        </tr>
                    @endif
                    @if($lewat)
                        <tr>
                            <td colspan="10">Sesi munaqosah sudah lewat!</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
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