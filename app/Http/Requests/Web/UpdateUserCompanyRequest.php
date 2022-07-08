<?php

namespace App\Http\Requests\Web;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserCompanyRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:250'],
            'surname' => ['required', 'string', 'max:250'],
            'company_name' => ['required', 'string', 'max:200'],
            'street' => ['required', 'string', 'max:150'],
            'building_number' => ['required', 'string', 'max:250'],
            'city' => ['required', 'string', 'max:60'],
            'nip' => ['required', 'string', 'max:12'],
            'order_recipient_parcel' => ['required', 'string'],
            'order_sending_parcel' => ['required', 'string'],
            'phone' => 'required|regex:/^[0-9]{9}$/',
            'postal_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}$/',
        ];
    }
}
