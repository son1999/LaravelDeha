<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest  extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:product,name',
            'description' => 'required|min:2',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'promotional' => 'numeric',
            'image' => 'required|image',
        ];
    }
    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute tối thiểu 2 kí tự',
            'max' => ':attribute tối đa 255 kí tự',
            'unique' => ':attribute đã tồn tại',
            'numeric' => ':attribute không phải là số',
            'image' => ':attribute không phải là hình ảnh',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'quantity' => 'Số lượng sản phẩm',
            'price' => 'Giá sản Phẩm',
            'promotional' => 'Giá khuyến mại',
            'image' =>  'Ảnh minh họa'
        ];
    }
}
