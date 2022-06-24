<?php

namespace App\Http\Requests;

use App\Models\DewanGuru;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDewanGuruRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('dewan_guru_create'),
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
            'telepon' => [
                'string',
                'nullable',
            ],
            'alamat' => [
                'string',
                'nullable',
            ],
        ];
    }
}