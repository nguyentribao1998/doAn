<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTinTucRequest extends FormRequest
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
            'TieuDe' => 'required|min:2|max:255|unique:product,name'.($this->id ?? ''),
            'TomTat' => 'required|min:2',
            'NoiDung' => 'required|min:2',
            'image' =>($this->id ? 'nullable' : 'required'). 'image',
            'NoiBat' => 'required|numeric',
            'SoLuotXem' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' => ":attribute không được để trống",
            'min'=>':attribute tối thiếu có 2-255 kí tự',
            'max'=>':attribute tối thiếu có 2-255 kí tự',
            'numeric' => ":attribute phải là số thực",
            'image' => ":attribute phải là hình ảnh",
            'unique' =>':attribute đã tồn tại trong hệ thống '
        ];
    }
    public function  attribute(){
        return[
            'TieuDe' => 'tên tin tức',
            'TomTat' => 'tóm tắt ngắn',
            'NoiBat'=>'nổi bật tin tức',
            'NoiDung' => 'mô tả tin tức',
            'image' => 'Ảnh minh họa',
            'SoLuotXem' =>'Số lượt xem'
        ];
    }
}
