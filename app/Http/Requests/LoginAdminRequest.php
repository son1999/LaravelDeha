<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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
//    public function rules(){
//        return[
//
//        ];
//    }
    public function rules()
    {
        return [
            'email' => 'required|min:2|max:255',
            'password' => 'required|min:2|max:255',
        ];
    }
    public function messages()
    {
        return [
          'required' => ':attribute khong duoc de trong',
          'min' => ':attribute toi thieu 2 ki tu',
          'max' => ':attribute toi da 255 ki tu',
          'unique' => ':attribute da ton tai',
        ];
    }
    public function attributes()
    {
       return [
           'email' => 'email',
//           'password' => 'password',
       ];
    }
}
