<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationIndividualRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'street' => ['required', 'string', 'max:150'],
            'building_number' => ['required', 'string', 'max:250'],
            'city' => ['required', 'string', 'max:60'],
            'password1' => ['required', 'string', 'min:8'],
            'password2' => 'required_with:password2|same:password1',
            'phone' => 'required|regex:/^[0-9]{9}$/',
            'postal_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}$/',
            'g-recaptcha-response' => 'recaptcha',
        ];
    }
}
