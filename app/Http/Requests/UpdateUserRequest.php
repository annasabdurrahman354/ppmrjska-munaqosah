<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('user_edit'),
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
            'nis' => [
                'string',
                'required',
                'unique:users,nis,' . request()->route('user')->id,
            ],
            'telepon' => [
                'string',
                'required',
            ],
            'email' => [
                'email:rfc',
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'universitas' => [
                'string',
                'required',
            ],
            'prodi' => [
                'string',
                'required',
            ],
            'angkatan_ppm' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'angkatan_kuliah' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'daerah' => [
                'string',
                'required',
            ],
            'desa' => [
                'string',
                'required',
            ],
            'kelompok' => [
                'string',
                'required',
            ],
            'provinsi_id' => [
                'integer',
                'exists:provinsis,id',
                'required',
            ],
            'kabupaten_id' => [
                'integer',
                'exists:kabupatens,id',
                'required',
            ],
            'alamat' => [
                'string',
                'required',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', array_keys(User::STATUS_SELECT)),
            ],
            'password' => [
                'string',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'locale' => [
                'string',
                'nullable',
            ],
        ];
    }
}