<?php

namespace App\Http\Requests;

use App\Models\Projet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('projet_edit');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'date_debut' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_fin' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'teams.*' => [
                'integer',
            ],
            'teams' => [
                'array',
            ],
        ];
    }
}
