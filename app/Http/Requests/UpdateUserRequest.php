<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUserRequest extends FormRequest
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

    public function messages(){
 return[
    'email.required'=>'Моля въведете валиден e-mail',
    'email.email'=>'2',
    'email.unique'=>'3',
    'password.required'=>'Моля въведете парола',
    'password.between'=>'Паролата трябва да има от :min до :max символа'
            ];
    }
    public function rules()
    {
      $user = User::find($this->user);
      $id=$user->id;
        return [
            'name'          => 'required|alpha_num',
                
               'email'      => 'required|unique:users,email,'.$id,
                'password'  =>  'required|between:3,10',
                'bio'       =>  'required|max:500'
        ];
    }
}
