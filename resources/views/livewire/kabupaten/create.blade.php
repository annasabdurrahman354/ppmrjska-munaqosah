<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('kabupaten.provinsi_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="provinsi">{{ trans('cruds.kabupaten.fields.provinsi') }}</label>
        <x-select-list class="form-control" required id="provinsi" name="provinsi" :options="$this->listsForFields['provinsi']" wire:model="kabupaten.provinsi_id" />
        <div class="validation-message">
            {{ $errors->first('kabupaten.provinsi_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kabupaten.fields.provinsi_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('kabupaten.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.kabupaten.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="kabupaten.name">
        <div class="validation-message">
            {{ $errors->first('kabupaten.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.kabupaten.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.kabupatens.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>