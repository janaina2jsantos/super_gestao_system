<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'unit_id'      => 'exists:units,id',
            'provider_id'  => 'exists:providers,id',
            'name'         => 'required|min:3|max:40',
            'weight'       => 'required|integer',
            'description'  => 'required|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'unit_id.exists' => 'The selected unit doesn´t exist.',
            'provider_id.exists' => 'The selected provider doesn´t exist.'
        ];
    }
}
