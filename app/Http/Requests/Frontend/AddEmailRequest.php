<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class AddEmailRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'max:120'],
            'email' => 'email:rfc,dns',
            'email' => 'unique:newsletter_emails'
        ];
    }
}
