<?php

namespace App\Http\Requests;

use App\Models\Provinsi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProvinsiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('provinsi_edit'),
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
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}