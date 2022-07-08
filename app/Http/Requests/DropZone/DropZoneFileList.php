<?php

namespace App\Http\Requests\DropZone;

use Illuminate\Foundation\Http\FormRequest;

class DropZoneFileList extends FormRequest
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
            'pageName' => ['required', 'string'],
            'id' => ['required', 'integer'],
        ];
    }
}
