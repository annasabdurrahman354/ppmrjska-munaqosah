<?php

namespace App\Http\Requests;

use App\Models\MateriKbm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMateriKbmRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('materi_kbm_edit'),
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
            'jenis' => [
                'required',
                'in:' . implode(',', array_keys(MateriKbm::JENIS_SELECT)),
            ],
            'halaman' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}