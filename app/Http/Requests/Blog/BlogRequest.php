<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:155'],
//            'small_content' => ['required', 'string'],
            'event_date' => ['required', 'string'],
            'visibility_date_from' => ['required', 'string'],
            'visibility_date_to' => ['required', 'string']
        ];
    }
}
