<?php

namespace App\Http\Requests;

use App\Models\Etiquette;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEtiquetteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('etiquette_edit');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
                'unique:etiquettes,nom,' . request()->route('etiquette')->id,
            ],
            'coleur' => [
                'string',
                'required',
                'unique:etiquettes,coleur,' . request()->route('etiquette')->id,
            ],
        ];
    }
}
