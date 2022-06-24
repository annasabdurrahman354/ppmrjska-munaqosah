<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('nilaiMunaqosah.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.nilaiMunaqosah.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="nilaiMunaqosah.user_id" />
        <div class="validation-message">
            {{ $errors->first('nilaiMunaqosah.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nilaiMunaqosah.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('nilaiMunaqosah.jadwal_munaqosah_id') ? 'invalid' : '' }}">
        <label class="form-label" for="jadwal_munaqosah">{{ trans('cruds.nilaiMunaqosah.fields.jadwal_munaqosah') }}</label>
        <x-select-list class="form-control" id="jadwal_munaqosah" name="jadwal_munaqosah" :options="$this->listsForFields['jadwal_munaqosah']" wire:model="nilaiMunaqosah.jadwal_munaqosah_id" />
        <div class="validation-message">
            {{ $errors->first('nilaiMunaqosah.jadwal_munaqosah_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nilaiMunaqosah.fields.jadwal_munaqosah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('nilaiMunaqosah.materi_munaqosah_id') ? 'invalid' : '' }}">
        <label class="form-label" for="materi_munaqosah">{{ trans('cruds.nilaiMunaqosah.fields.materi_munaqosah') }}</label>
        <x-select-list class="form-control" id="materi_munaqosah" name="materi_munaqosah" :options="$this->listsForFields['materi_munaqosah']" wire:model="nilaiMunaqosah.materi_munaqosah_id" />
        <div class="validation-message">
            {{ $errors->first('nilaiMunaqosah.materi_munaqosah_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nilaiMunaqosah.fields.materi_munaqosah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('nilaiMunaqosah.dewan_guru_id') ? 'invalid' : '' }}">
        <label class="form-label" for="dewan_guru">{{ trans('cruds.nilaiMunaqosah.fields.dewan_guru') }}</label>
        <x-select-list class="form-control" id="dewan_guru" name="dewan_guru" :options="$this->listsForFields['dewan_guru']" wire:model="nilaiMunaqosah.dewan_guru_id" />
        <div class="validation-message">
            {{ $errors->first('nilaiMunaqosah.dewan_guru_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nilaiMunaqosah.fields.dewan_guru_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('nilaiMunaqosah.nilai_bacaan') ? 'invalid' : '' }}">
        <label class="form-label required" for="nilai_bacaan">{{ trans('cruds.nilaiMunaqosah.fields.nilai_bacaan') }}</label>
        <input class="form-control" type="number" name="nilai_bacaan" id="nilai_bacaan" required wire:model.defer="nilaiMunaqosah.nilai_bacaan" step="1">
        <div class="validation-message">
            {{ $errors->first('nilaiMunaqosah.nilai_bacaan') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nilaiMunaqosah.fields.nilai_bacaan_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('nilaiMunaqosah.nilai_pemahaman') ? 'invalid' : '' }}">
        <label class="form-label required" for="nilai_pemahaman">{{ trans('cruds.nilaiMunaqosah.fields.nilai_pemahaman') }}</label>
        <input class="form-control" type="number" name="nilai_pemahaman" id="nilai_pemahaman" required wire:model.defer="nilaiMunaqosah.nilai_pemahaman" step="1">
        <div class="validation-message">
            {{ $errors->first('nilaiMunaqosah.nilai_pemahaman') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nilaiMunaqosah.fields.nilai_pemahaman_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('nilaiMunaqosah.nilai_kelengkapan') ? 'invalid' : '' }}">
        <label class="form-label required" for="nilai_kelengkapan">{{ trans('cruds.nilaiMunaqosah.fields.nilai_kelengkapan') }}</label>
        <input class="form-control" type="text" name="nilai_kelengkapan" id="nilai_kelengkapan" required wire:model.defer="nilaiMunaqosah.nilai_kelengkapan">
        <div class="validation-message">
            {{ $errors->first('nilaiMunaqosah.nilai_kelengkapan') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.nilaiMunaqosah.fields.nilai_kelengkapan_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.nilai-munaqosah.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>