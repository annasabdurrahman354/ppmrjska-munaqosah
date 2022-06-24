<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('materiMunaqosah.materi') ? 'invalid' : '' }}">
        <label class="form-label required" for="materi">{{ trans('cruds.materiMunaqosah.fields.materi') }}</label>
        <input class="form-control" type="text" name="materi" id="materi" required wire:model.defer="materiMunaqosah.materi">
        <div class="validation-message">
            {{ $errors->first('materiMunaqosah.materi') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiMunaqosah.fields.materi_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('materiMunaqosah.jenis') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.materiMunaqosah.fields.jenis') }}</label>
        <select class="form-control" wire:model="materiMunaqosah.jenis">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['jenis'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('materiMunaqosah.jenis') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiMunaqosah.fields.jenis_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('materiMunaqosah.keterangan') ? 'invalid' : '' }}">
        <label class="form-label required" for="keterangan">{{ trans('cruds.materiMunaqosah.fields.keterangan') }}</label>
        <input class="form-control" type="text" name="keterangan" id="keterangan" required wire:model.defer="materiMunaqosah.keterangan">
        <div class="validation-message">
            {{ $errors->first('materiMunaqosah.keterangan') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiMunaqosah.fields.keterangan_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('materiMunaqosah.angkatan') ? 'invalid' : '' }}">
        <label class="form-label required" for="angkatan">{{ trans('cruds.materiMunaqosah.fields.angkatan') }}</label>
        <input class="form-control" type="number" name="angkatan" id="angkatan" required wire:model.defer="materiMunaqosah.angkatan" step="1">
        <div class="validation-message">
            {{ $errors->first('materiMunaqosah.angkatan') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiMunaqosah.fields.angkatan_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('materiMunaqosah.tahun_pelajaran') ? 'invalid' : '' }}">
        <label class="form-label required" for="tahun_pelajaran">{{ trans('cruds.materiMunaqosah.fields.tahun_pelajaran') }}</label>
        <input class="form-control" type="text" name="tahun_pelajaran" id="tahun_pelajaran" required wire:model.defer="materiMunaqosah.tahun_pelajaran">
        <div class="validation-message">
            {{ $errors->first('materiMunaqosah.tahun_pelajaran') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiMunaqosah.fields.tahun_pelajaran_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('materiMunaqosah.semester') ? 'invalid' : '' }}">
        <label class="form-label required" for="semester">{{ trans('cruds.materiMunaqosah.fields.semester') }}</label>
        <input class="form-control" type="number" name="semester" id="semester" required wire:model.defer="materiMunaqosah.semester" step="1">
        <div class="validation-message">
            {{ $errors->first('materiMunaqosah.semester') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.materiMunaqosah.fields.semester_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.materi-munaqosah.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>