<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('materiKbm.materi') ? 'invalid' : '' }}">
        <label class="form-label required" for="materi">{{ trans('cruds.materiKbm.fields.materi') }}</label>
        <input class="form-control" type="text" name="materi" id="materi" required wire:model.defer="materiKbm.materi">
        <div class="validation-message">
            {{ $errors->first('materiKbm.materi') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiKbm.fields.materi_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('materiKbm.jenis') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.materiKbm.fields.jenis') }}</label>
        <select class="form-control" wire:model="materiKbm.jenis">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['jenis'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('materiKbm.jenis') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiKbm.fields.jenis_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('materiKbm.halaman') ? 'invalid' : '' }}">
        <label class="form-label" for="halaman">{{ trans('cruds.materiKbm.fields.halaman') }}</label>
        <input class="form-control" type="number" name="halaman" id="halaman" wire:model.defer="materiKbm.halaman" step="1">
        <div class="validation-message">
            {{ $errors->first('materiKbm.halaman') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiKbm.fields.halaman_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.materi-kbm.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>