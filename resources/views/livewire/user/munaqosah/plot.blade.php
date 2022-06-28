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
                        @if($angkatan)
                        <tr>
                            <td colspan="10">Sesi munaqosah masih kosong!</td>
                        </tr>
                        @endif
                    @endforelse
                    
                    @if(!$angkatan)
                        <tr>
                            <td colspan="10">Ini bukan sesi munaqosah untuk angkatan Anda!</td>
                        </tr>
                    @endif
                    @if($angkatan)
                        @if($full)
                            <tr>
                                <td colspan="10" class="">Kuota sesi munaqosah penuh!</td>
                            </tr>
                        @endif
                        @if($taken)
                            <tr>
                                <td colspan="10">Anda telah mengambil jadwal munaqosah untuk materi ini!</td>
                            </tr>
                        @endif
                        @if($lewat)
                            <tr>
                                <td colspan="10">Sesi munaqosah sudah lewat!</td>
                            </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if(!$taken && !$full && !$lewat && $angkatan)
            <div class="text-center mt-6">
                <button wire:click="ambilJadwal" class="md:w-1/4 bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                    Ambil Jadwal Munaqosah
                </button>
            </div>
            @endif
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