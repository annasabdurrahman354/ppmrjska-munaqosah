<?php

namespace App\Http\Requests;

use App\Models\JadwalMunaqosah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJadwalMunaqosahRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('jadwal_munaqosah_create'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'jadwalMunaqosah.sesi' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'keterangan' => [
                'string',
                'required',
            ],
            'materi_id' => [
                'integer',
                'exists:materi_munaqosahs,id',
                'required',
            ],
            'dewan_guru_id' => [
                'integer',
                'exists:dewan_gurus,id',
                'required',
            ],
            'maks_santri' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}