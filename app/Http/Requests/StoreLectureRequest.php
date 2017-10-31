<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLectureRequest extends FormRequest
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
                 'name'          => 'required|alpha_num|unique:lectures',
                
                'start_date'     =>  'required|date|date_format:Y-m-d',
                'end_date'       =>  'required|date|date_format:Y-m-d',
                'hasHomework'    =>  'required|boolean'
        ];
    }
}
