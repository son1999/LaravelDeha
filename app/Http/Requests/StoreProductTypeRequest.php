<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductTypeRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:producttype,name,'.($this->id ?? ""),
        ];
    }

    public function messages(){
        return [
            'required' => 'Tên loại sản phẩm không được bỏ trống',
            'min' => 'Tên loại sản phẩm tối thiểu có 2 kí tự',
            'max' => 'Tên loại sản phẩm tối đa 255 kí tự',
            'unique' => 'Tên loại sản phẩm đã tồn tại'
        ];
    }
}
