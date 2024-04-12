<?php

namespace App\Http\Requests;

use App\Models\Reunion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReunionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reunion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reunions,id',
        ];
    }
}
