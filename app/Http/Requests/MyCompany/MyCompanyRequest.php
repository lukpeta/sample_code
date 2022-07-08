<?php

namespace App\Http\Requests\MyCompany;

use Illuminate\Foundation\Http\FormRequest;

class MyCompanyRequest extends FormRequest
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
            'name' => 'required|string',
            'nip' => 'required|string',
            'regon' => 'string',
            'contact_person' => 'required|string',
            'provincial_id' => 'required|integer',
            'phone' => 'required|string',
            'name2' => 'required|string',
            'nip2' => 'required|string',
            'street2' => 'required|string',
            'city2' => 'required|string',
            'postal_code2' => 'required|string',
            'country_id' => 'required|integer',
        ];
    }
}
