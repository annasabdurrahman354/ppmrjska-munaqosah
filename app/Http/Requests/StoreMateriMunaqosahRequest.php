<?php

namespace App\Http\Requests;

use App\Models\MateriMunaqosah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMateriMunaqosahRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('materi_munaqosah_create'),
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
            'materi' => [
                'string',
                'required',
            ],
            'keterangan' => [
                'string',
                'required',
            ],
            'jenis' => [
                'required',
                'in:' . implode(',', array_keys(MateriMunaqosah::JENIS_SELECT)),
            ],
            'angkatan' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'tahun_pelajaran' => [
                'string',
                'required',
            ],
            'semester' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}