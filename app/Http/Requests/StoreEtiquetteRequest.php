<?php

namespace App\Http\Requests;

use App\Models\Etiquette;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEtiquetteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('etiquette_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
                'unique:etiquettes',
            ],
            'coleur' => [
                'string',
                'required',
                'unique:etiquettes',
            ],
        ];
    }
}
