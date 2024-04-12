<?php

namespace App\Http\Requests;

use App\Models\Liste;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateListeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('liste_edit');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
            'position' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'projet_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
