<?php

namespace App\Http\Requests;

use App\Models\Tach;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTachRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tach_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:taches,id',
        ];
    }
}
