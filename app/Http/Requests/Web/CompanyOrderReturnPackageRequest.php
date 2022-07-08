<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CompanyOrderReturnPackageRequest extends FormRequest
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
            'order_name' => ['required', 'string'],
            'order_surname' => ['required', 'string'],
            'order_address' => ['required', 'string'],
            'order_city' => ['required', 'string'],
            'building_number' => ['required', 'string'],
//            'order_post_code' => ['required', 'string'],
            'order_email' => ['required', 'string'],
//            'order_phone' => ['required', 'string'],
            'shipping_method' => ['required', 'integer'],
            'package_type' => ['required', 'integer'],
            'package_size' => ['required', 'integer'],
//            'order_post_value' => ['required', 'string'],
            'order_sending_parcel' => ['required', 'string'],
            'order_recipient_parcel' => ['required', 'string'],
            'shipping_company' => ['required', 'string'],

            'order_phone' => 'required|regex:/^[0-9]{9}$/',
            'order_post_code' => 'required|regex:/^[0-9]{2}-[0-9]{3}$/',
        ];
    }
}
