<?php

namespace App\Http\Requests;

use App\Models\Kecamatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKecamatanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('kecamatan_edit'),
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
            'kabupaten_id' => [
                'integer',
                'exists:kabupatens,id',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}