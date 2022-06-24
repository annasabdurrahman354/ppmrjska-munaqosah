<?php

namespace App\Http\Requests;

use App\Models\NilaiMunaqosah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNilaiMunaqosahRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('nilai_munaqosah_edit'),
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
            'user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'jadwal_munaqosah_id' => [
                'integer',
                'exists:jadwal_munaqosahs,id',
                'nullable',
            ],
            'materi_munaqosah_id' => [
                'integer',
                'exists:materi_munaqosahs,id',
                'nullable',
            ],
            'dewan_guru_id' => [
                'integer',
                'exists:dewan_gurus,id',
                'nullable',
            ],
            'nilai_bacaan' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'nilai_pemahaman' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'nilai_kelengkapan' => [
                'string',
                'required',
            ],
        ];
    }
}