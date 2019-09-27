<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProducttypeRequest extends FormRequest
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
            'name'=>'required|min:2|max:255|unique:product_types,name',
            //
        ];
    }
    public function messages()
    {
        return [
            'required' => ":attribute không được để trống",
            'min'=>':attribute tối thiếu có 2-255 kí tự',
            'max'=>':attribute tối thiếu có 2-255 kí tự',
            'unique'=> ":attribute đã tồn tại trong hệ thống"
        ];
    }
    public function  attribute(){
        return[
            'name'=>'tên loại sản phẩm',
        ];
    }
}
