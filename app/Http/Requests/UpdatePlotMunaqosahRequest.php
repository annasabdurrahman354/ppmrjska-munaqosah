<?php

namespace App\Http\Requests;

use App\Models\PlotMunaqosah;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePlotMunaqosahRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('plot_munaqosah_edit'),
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
            'jadwal_munaqosah_id' => [
                'integer',
                'exists:jadwal_munaqosahs,id',
                'required',
            ],
            'user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }
}