<?php

namespace App\Http\Requests;

use App\Models\Kelurahan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKelurahanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('kelurahan_create'),
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
            'kecamatan_id' => [
                'integer',
                'exists:kecamatans,id',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}