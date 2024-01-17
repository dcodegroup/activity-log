<?php

namespace Dcodegroup\ActivityLog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExistingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'modelClass' => [
                'required',
                'string',
            ],
            'modelId' => [
                'required',
                'integer',
                Rule::exists($this->input('modelClass'), 'id'),
            ],
        ];
    }
}