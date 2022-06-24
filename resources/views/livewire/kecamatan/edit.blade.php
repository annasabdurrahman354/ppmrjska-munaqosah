<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('kecamatan.kabupaten_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kabupaten">{{ trans('cruds.kecamatan.fields.kabupaten') }}</label>
        <x-select-list class="form-control" required id="kabupaten" name="kabupaten" :options="$this->listsForFields['kabupaten']" wire:model="kecamatan.kabupaten_id" />
        <div class="validation-message">
            {{ $errors->first('kecamatan.kabupaten_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kecamatan.fields.kabupaten_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kecamatan.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.kecamatan.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="kecamatan.name">
        <div class="validation-message">
            {{ $errors->first('kecamatan.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kecamatan.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.kecamatans.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>