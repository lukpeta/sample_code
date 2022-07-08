<?php

namespace App\Http\Requests\Slide;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'line1' => ['required', 'string', 'max:120'],
            'url' => ['required', 'string', 'max:250'],
            'position' => ['required', 'integer'],
            'visibility_date_from' => ['required', 'string'],
            'visibility_date_to' => ['required', 'string'],
        ];
    }
}
