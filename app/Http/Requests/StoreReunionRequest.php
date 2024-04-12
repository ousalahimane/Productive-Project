<?php

namespace App\Http\Requests;

use App\Models\Reunion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReunionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reunion_create');
    }

    public function rules()
    {
        return [
            'titre' => [
                'string',
                'required',
                'unique:reunions',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'participants.*' => [
                'integer',
            ],
            'participants' => [
                'required',
                'array',
            ],
        ];
    }
}
