<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Admin_Register extends FormRequest
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
            'repassword' => 'required|min:6|same:password',

         
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

        'repassword.required' => 'Vui lòng nhập lại Password',
        'repassword.required.min'  => 'Confirm Password phải trên 6 ký tự',
        'repassword.same' => 'Confirm Password chưa đúng'


        ];
    }
}
