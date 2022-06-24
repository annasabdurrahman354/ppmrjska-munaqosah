<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('provinsi.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.provinsi.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="provinsi.name">
        <div class="validation-message">
            {{ $errors->first('provinsi.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.provinsi.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.provinsis.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>