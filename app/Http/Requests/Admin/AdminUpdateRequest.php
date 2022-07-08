<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'password' => 'required_with:password|same:password2',
            'phone' => 'required|regex:/^[0-9]{9}$/',
            'postal_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}$/',
        ];
    }
}
