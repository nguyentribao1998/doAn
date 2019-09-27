<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
class StoreCategoryRequest extends FormRequest
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
            'name'=>'required|min:2|max:255|unique:category,name,'.($this->id ?? '')
        ];
    }
    public function messages()
    {
        return[
           'required' => ":attribute không được để trống",
            'min'=>':attribute tối thiếu có 2-255 kí tự',
            'max'=>':attribute tối thiếu có 2-255 kí tự',
            'unique'=>':attribute đã tồn tạo trong hệ thống'
        ] ;
    }
    public function  attributes(){
        return[
            'name'=>'tên danh mục sản phẩm',
        ];
    }
}
