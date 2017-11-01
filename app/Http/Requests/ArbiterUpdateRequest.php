<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArbiterUpdateRequest extends FormRequest
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
    public function messages()
    {
        return [
            'name.required' => 'Полето Име е задължително за попълване!',
            'name.min' => 'Полето Име трябва да е поне 3 знака!',
            'email.required' => 'Полето Имейл е задължително за попълване!',
            'email.email' => 'Полето Имеил трябва да е валиден e-mail!',
            'email.unique' => 'Вече съществува потребител с такъв имейл!',
            'password.required' => 'Полето Парола е задължително за попълване!',
            'password.min' => 'Полето Парола трябва да е поне 6 знака!',
            'picture.mimes' => 'Снимката трбва да е валиден JPG, JPEG или PNG формат!',
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users,email,'.$this->route('arbiter'),
            'password' => 'required|min:6',
            'picture' => 'mimes:jpg,jpeg,png',
        ];
    }
}