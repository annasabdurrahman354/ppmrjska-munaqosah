<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('plotMunaqosah.jadwal_munaqosah_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="jadwal_munaqosah">{{ trans('cruds.plotMunaqosah.fields.jadwal_munaqosah') }}</label>
        <x-select-list class="form-control" required id="jadwal_munaqosah" name="jadwal_munaqosah" :options="$this->listsForFields['jadwal_munaqosah']" wire:model="plotMunaqosah.jadwal_munaqosah_id" />
        <div class="validation-message">
            {{ $errors->first('plotMunaqosah.jadwal_munaqosah_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.plotMunaqosah.fields.jadwal_munaqosah_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('plotMunaqosah.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.plotMunaqosah.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="plotMunaqosah.user_id" />
        <div class="validation-message">
            {{ $errors->first('plotMunaqosah.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.plotMunaqosah.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.plot-munaqosah.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>