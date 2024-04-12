<?php

namespace App\Http\Requests;

use App\Models\Tach;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTachRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tach_edit');
    }

    public function rules()
    {
        return [
            'position' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'etiquettes.*' => [
                'integer',
            ],
            'etiquettes' => [
                'array',
            ],
        ];
    }
}
