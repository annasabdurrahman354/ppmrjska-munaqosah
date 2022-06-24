<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('kelurahan.kecamatan_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="kecamatan">{{ trans('cruds.kelurahan.fields.kecamatan') }}</label>
        <x-select-list class="form-control" required id="kecamatan" name="kecamatan" :options="$this->listsForFields['kecamatan']" wire:model="kelurahan.kecamatan_id" />
        <div class="validation-message">
            {{ $errors->first('kelurahan.kecamatan_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kelurahan.fields.kecamatan_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kelurahan.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.kelurahan.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="kelurahan.name">
        <div class="validation-message">
            {{ $errors->first('kelurahan.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kelurahan.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.kelurahans.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>