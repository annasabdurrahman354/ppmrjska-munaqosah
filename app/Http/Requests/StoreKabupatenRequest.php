<?php

namespace App\Http\Requests;

use App\Models\Kabupaten;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKabupatenRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('kabupaten_create'),
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
            'provinsi_id' => [
                'integer',
                'exists:provinsis,id',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}