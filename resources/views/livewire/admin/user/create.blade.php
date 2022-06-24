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
    <div class="form-group {{ $errors->has('user.universitas') ? 'invalid' : '' }}">
        <label class="form-label required" for="universitas">{{ trans('cruds.user.fields.universitas') }}</label>
        <input class="form-control" type="text" name="universitas" id="universitas" required wire:model.defer="user.universitas">
        <div class="validation-message">
            {{ $errors->first('user.universitas') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.universitas_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.prodi') ? 'invalid' : '' }}">
        <label class="form-label required" for="prodi">{{ trans('cruds.user.fields.prodi') }}</label>
        <input class="form-control" type="text" name="prodi" id="prodi" required wire:model.defer="user.prodi">
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
        <label class="form-label required" for="angkatan_kuliah">{{ trans('cruds.user.fields.angkatan_kuliah') }}</label>
        <input class="form-control" type="number" name="angkatan_kuliah" id="angkatan_kuliah" required wire:model.defer="user.angkatan_kuliah" step="1">
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
    <div class="form-group {{ $errors->has('user.provinsi_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="provinsi">{{ trans('cruds.user.fields.provinsi') }}</label>
        <x-select-list class="form-control" required id="provinsi" name="provinsi" :options="$this->listsForFields['provinsi']" wire:model="user.provinsi_id" />
        <div class="validation-message">
            {{ $errors->first('user.provinsi_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.provinsi_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.kabupaten_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kabupaten">{{ trans('cruds.user.fields.kabupaten') }}</label>
        <x-select-list class="form-control" required id="kabupaten" name="kabupaten" :options="$this->listsForFields['kabupaten']" wire:model="user.kabupaten_id" />
        <div class="validation-message">
            {{ $errors->first('user.kabupaten_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.kabupaten_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.kecamatan_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kecamatan">{{ trans('cruds.user.fields.kecamatan') }}</label>
        <x-select-list class="form-control" required id="kecamatan" name="kecamatan" :options="$this->listsForFields['kecamatan']" wire:model="user.kecamatan_id" />
        <div class="validation-message">
            {{ $errors->first('user.kecamatan_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.kecamatan_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.kelurahan_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kelurahan">{{ trans('cruds.user.fields.kelurahan') }}</label>
        <x-select-list class="form-control" required id="kelurahan" name="kelurahan" :options="$this->listsForFields['kelurahan']" wire:model="user.kelurahan_id" />
        <div class="validation-message">
            {{ $errors->first('user.kelurahan_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.kelurahan_helper') }}
        </div>
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
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <label class="form-label required" for="password">{{ trans('cruds.user.fields.password') }}</label>
        <input class="form-control" type="password" name="password" id="password" required wire:model.defer="password">
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