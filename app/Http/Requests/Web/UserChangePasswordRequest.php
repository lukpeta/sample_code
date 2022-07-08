<?php

namespace App\Http\Requests\Web;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UserChangePasswordRequest extends FormRequest
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
            'actual_password' => ['required', new MatchOldPassword],
            'actual_new_password1' => ['required', 'string', 'min:8'],
            'actual_new_password2' => 'required_with:actual_new_password1|same:actual_new_password2'
        ];
    }
}
