<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.nis') ? 'invalid' : '' }}">
        <label class="form-label required" for="nis">{{ trans('cruds.user.fields.nis') }}</label>
        <input class="form-control" type="text" name="nis" id="nis" required wire:model.defer="user.nis">
        <div class="validation-message">
            {{ $errors->first('user.nis') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.nis_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.telepon') ? 'invalid' : '' }}">
        <label class="form-label required" for="telepon">{{ trans('cruds.user.fields.telepon') }}</label>
        <input class="form-control" type="text" name="telepon" id="telepon" required wire:model.defer="user.telepon">
        <div class="validation-message">
            {{ $errors->first('user.telepon') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.telepon_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.jenis_kelamin') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.user.fields.jenis_kelamin') }}</label>
        <select class="form-control" wire:model="user.jenis_kelamin">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['jenis_kelamin'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('user.jenis_kelamin') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.universitas') ? 'invalid' : '' }}">
        <label class="form-label" for="universitas">{{ trans('cruds.user.fields.universitas') }}</label>
        <input class="form-control" type="text" name="universitas" id="universitas" wire:model.defer="user.universitas">
        <div class="validation-message">
            {{ $errors->first('user.universitas') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.universitas_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.prodi') ? 'invalid' : '' }}">
        <label class="form-label" for="prodi">{{ trans('cruds.user.fields.prodi') }}</label>
        <input class="form-control" type="text" name="prodi" id="prodi" wire:model.defer="user.prodi">
        <div class="validation-message">
            {{ $errors->first('user.prodi') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.prodi_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.angkatan_ppm') ? 'invalid' : '' }}">
        <label class="form-label required" for="angkatan_ppm">{{ trans('cruds.user.fields.angkatan_ppm') }}</label>
        <input class="form-control" type="number" name="angkatan_ppm" id="angkatan_ppm" required wire:model.defer="user.angkatan_ppm" step="1">
        <div class="validation-message">
            {{ $errors->first('user.angkatan_ppm') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.angkatan_ppm_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.angkatan_kuliah') ? 'invalid' : '' }}">
        <label class="form-label" for="angkatan_kuliah">{{ trans('cruds.user.fields.angkatan_kuliah') }}</label>
        <input class="form-control" type="number" name="angkatan_kuliah" id="angkatan_kuliah" wire:model.defer="user.angkatan_kuliah" step="1">
        <div class="validation-message">
            {{ $errors->first('user.angkatan_kuliah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.angkatan_kuliah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.daerah') ? 'invalid' : '' }}">
        <label class="form-label required" for="daerah">{{ trans('cruds.user.fields.daerah') }}</label>
        <input class="form-control" type="text" name="daerah" id="daerah" required wire:model.defer="user.daerah">
        <div class="validation-message">
            {{ $errors->first('user.daerah') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.daerah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.desa') ? 'invalid' : '' }}">
        <label class="form-label required" for="desa">{{ trans('cruds.user.fields.desa') }}</label>
        <input class="form-control" type="text" name="desa" id="desa" required wire:model.defer="user.desa">
        <div class="validation-message">
            {{ $errors->first('user.desa') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.desa_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.kelompok') ? 'invalid' : '' }}">
        <label class="form-label required" for="kelompok">{{ trans('cruds.user.fields.kelompok') }}</label>
        <input class="form-control" type="text" name="kelompok" id="kelompok" required wire:model.defer="user.kelompok">
        <div class="validation-message">
            {{ $errors->first('user.kelompok') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.kelompok_helper') }}
        </div>
    </div>



    <div class="flex flex-row gap-x-4 mb-1">
        <div class="flex-1">
            <label class="block text-blueGray-600 font-medium text-sm mb-2">Provinsi</label>
            <select wire:model="provinsi" class="select-box w-full mr-2" id="provinsi" name="provinsi">
                <option value="" selected>Pilih provinsi</option>
                @foreach($semuaProvinsi as $prov)
                    <option value="{{ $prov->id }}">{{ $prov->name }}</option>
                @endforeach
            </select>
            @error('provinsi')  
            <div class="text-red-500">
                <small>{{ $message }}</small>
            </div>
            @enderror
        </div>

        @if ($provinsi != null)
            <div class="flex-1">
                <label class="block text-blueGray-600 font-medium text-sm mb-2">Kota/Kabupaten</label>
                <select wire:model="kabupaten" class="select-box w-full" id="kabupaten" name="kabupaten">
                    <option value="" selected>Pilih kota/kabupaten</option>
                    @foreach($semuaKabupaten as $kab)
                        <option value="{{ $kab->id }}">{{ $kab->name }}</option>
                    @endforeach
                </select>
                @error('kabupaten')
                <div class="text-red-500">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        @endif
    </div>

    <div class="flex flex-row gap-x-4 mb-3">
        @if ($kabupaten != null && $provinsi != null)
            <div class="flex-1 mt-2">
                <label class="block text-blueGray-600 font-medium text-sm mb-2">Kecamatan</label>
                <select wire:model="kecamatan" class="select-box w-full mr-2" id="kecamatan" name="kecamatan">
                    <option value="" selected>Pilih kecamatan</option>
                    @foreach($semuaKecamatan as $kec)
                        <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                    @endforeach
                </select>
                @error('kecamatan')
                <div class="text-red-500">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        @endif

        @if ($kecamatan != null && $kabupaten != null && $provinsi != null)
            <div class="flex-1 mt-2">
                <label class="block text-blueGray-600 font-medium text-sm mb-2">Kelurahan</label>
                <select wire:model="kelurahan" class="select-box w-full" id="kelurahan" name="kelurahan">
                    <option value="" selected>Pilih kelurahan</option>
                    @foreach($semuaKelurahan as $kel)
                        <option value="{{ $kel->id }}">{{ $kel->name }}</option>
                    @endforeach
                </select>
                @error('kelurahan')
                <div class="text-red-500">
                    <small>{{ $message }}</small>
                </div>
                @enderror
            </div>
        @endif
    </div>

    <div class="form-group {{ $errors->has('user.alamat') ? 'invalid' : '' }}">
        <label class="form-label required" for="alamat">{{ trans('cruds.user.fields.alamat') }}</label>
        <input class="form-control" type="text" name="alamat" id="alamat" required wire:model.defer="user.alamat">
        <div class="validation-message">
            {{ $errors->first('user.alamat') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.alamat_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.status') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.user.fields.status') }}</label>
        <select class="form-control" wire:model="user.status">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['status'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('user.status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.locale') ? 'invalid' : '' }}">
        <label class="form-label" for="locale">{{ trans('cruds.user.fields.locale') }}</label>
        <input class="form-control" type="text" name="locale" id="locale" wire:model.defer="user.locale">
        <div class="validation-message">
            {{ $errors->first('user.locale') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.locale_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>