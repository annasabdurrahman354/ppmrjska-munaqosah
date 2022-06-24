<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('jadwalMunaqosah.sesi') ? 'invalid' : '' }}">
        <label class="form-label required" for="sesi">{{ trans('cruds.jadwalMunaqosah.fields.sesi') }}</label>
        <x-date-picker class="form-control" required wire:model="jadwalMunaqosah.sesi" id="sesi" name="sesi" />
        <div class="validation-message">
            {{ $errors->first('jadwalMunaqosah.sesi') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.jadwalMunaqosah.fields.sesi_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('jadwalMunaqosah.materi_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="materi">{{ trans('cruds.jadwalMunaqosah.fields.materi') }}</label>
        <x-select-list class="form-control" required id="materi" name="materi" :options="$this->listsForFields['materi']" wire:model="jadwalMunaqosah.materi_id" />
        <div class="validation-message">
            {{ $errors->first('jadwalMunaqosah.materi_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.jadwalMunaqosah.fields.materi_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('jadwalMunaqosah.dewan_guru_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="dewan_guru">{{ trans('cruds.jadwalMunaqosah.fields.dewan_guru') }}</label>
        <x-select-list class="form-control" required id="dewan_guru" name="dewan_guru" :options="$this->listsForFields['dewan_guru']" wire:model="jadwalMunaqosah.dewan_guru_id" />
        <div class="validation-message">
            {{ $errors->first('jadwalMunaqosah.dewan_guru_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.jadwalMunaqosah.fields.dewan_guru_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('jadwalMunaqosah.maks_santri') ? 'invalid' : '' }}">
        <label class="form-label required" for="maks_santri">{{ trans('cruds.jadwalMunaqosah.fields.maks_santri') }}</label>
        <input class="form-control" type="number" name="maks_santri" id="maks_santri" required wire:model.defer="jadwalMunaqosah.maks_santri" step="1">
        <div class="validation-message">
            {{ $errors->first('jadwalMunaqosah.maks_santri') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.jadwalMunaqosah.fields.maks_santri_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.jadwal-munaqosah.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>