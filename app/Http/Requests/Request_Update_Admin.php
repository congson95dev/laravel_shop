<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Update_Admin extends FormRequest
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
            'fullname' => 'required',
            'mobile_number' => 'required|numeric|digits_between:11,11',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
    return [
        'fullname.required' => 'Vui lòng nhập Họ tên',
        
        'mobile_number.required' => 'Vui lòng nhập số điện thoại',
        'mobile_number.numeric' => 'Số điện thoại chưa được nhập đúng định dạng',
        'mobile_number.digits_between' => 'Số điện thoại gồm 11 ký tự',

        'image.image' => 'Vui lòng chọn file ảnh đúng định dạng',
        'image.mimes' => 'Bạn nhập không đúng định dạng ảnh (jpeg,png,jpg,gif,svg)',
        ];
    }
}
