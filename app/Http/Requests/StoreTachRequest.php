<?php

namespace App\Http\Requests;

use App\Models\Tach;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTachRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tach_create');
    }

    public function rules()
    {
        return [
            
        ];
    }
}
