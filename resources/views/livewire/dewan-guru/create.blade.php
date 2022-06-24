<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('dewanGuru.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.dewanGuru.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="dewanGuru.name">
        <div class="validation-message">
            {{ $errors->first('dewanGuru.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dewanGuru.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dewanGuru.telepon') ? 'invalid' : '' }}">
        <label class="form-label" for="telepon">{{ trans('cruds.dewanGuru.fields.telepon') }}</label>
        <input class="form-control" type="text" name="telepon" id="telepon" wire:model.defer="dewanGuru.telepon">
        <div class="validation-message">
            {{ $errors->first('dewanGuru.telepon') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dewanGuru.fields.telepon_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('dewanGuru.alamat') ? 'invalid' : '' }}">
        <label class="form-label" for="alamat">{{ trans('cruds.dewanGuru.fields.alamat') }}</label>
        <input class="form-control" type="text" name="alamat" id="alamat" wire:model.defer="dewanGuru.alamat">
        <div class="validation-message">
            {{ $errors->first('dewanGuru.alamat') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.dewanGuru.fields.alamat_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.dewan-guru.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>