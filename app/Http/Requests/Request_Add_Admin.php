<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Add_Admin extends FormRequest
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
            'email' => 'required|unique:users|email',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'mobile_number' => 'required|numeric|digits_between:11,11',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
    return [
        'fullname.required' => 'Vui lòng nhập Họ tên',

        'email.required' => 'Vui lòng nhập Email',
        'email.email' => 'Không đúng định dạng E-mail',
        'email.unique' => 'E-mail này đã được sử dụng',

        'username.required' => 'Vui lòng nhập Tài Khoản',
        'username.unique' => 'Tài Khoản này đã được sử dụng',

        'password.required' => 'Vui lòng nhập Password',
        'password.min'  => 'Password phải trên 6 ký tự',

        'mobile_number.required' => 'Vui lòng nhập số điện thoại',
        'mobile_number.numeric' => 'Số điện thoại chưa được nhập đúng định dạng',
        'mobile_number.digits_between' => 'Số điện thoại gồm 11 ký tự',

        'image.image' => 'Vui lòng chọn file ảnh đúng định dạng',
        'image.mimes' => 'Bạn nhập không đúng định dạng ảnh (jpeg,png,jpg,gif,svg)',
        ];
    }
}
