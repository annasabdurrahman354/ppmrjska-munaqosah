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
                                    {{ $plotMunaqosah->jadwalMunaqosah->materi->jenis_label }}
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

                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">Kuota sesi munaqosah masih kosong!</td>
                        </tr>
                    @endforelse

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