<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteContactRequest extends FormRequest
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
            'contact_reason_id' => 'required',
            'name'  => 'required|min:3|max:40',
            'phone' => 'required',
            'email' => 'email|unique:site_contacts',
            'message' => 'required|max:2000'
        ];
    }
}
