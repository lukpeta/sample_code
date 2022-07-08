<?php

namespace App\Http\Requests\DropZone;

use Illuminate\Foundation\Http\FormRequest;

class DropZoneUploadFile extends FormRequest
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
            'myFile' => 'required',
            'myFile.*' => 'max:50000',
            'myFile.*' => 'mimes:jpeg,jpg,pdf,doc,docx,xls,xlsx,zip,rar,7zip,arj,jpg,png,gif,txt,ppt,pptx,docm,dotm,wps,wks,wcm,wdb,xls,xlm,xla,xlc,xlt,xlw,mpeg,mp3,mp2,aiff,wav,wave,flac,m4a,caf,ogg,aac,amr,wma,application/msword,text/plain,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];
    }
}
