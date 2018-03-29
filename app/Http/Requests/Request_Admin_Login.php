<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Admin_Login extends FormRequest
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
            'username' => 'required',
            'password' => 'required|min:6',
         ];
    }
    public function messages()
    {
    return [
        'username.required' => 'Vui lòng nhập Tài Khoản',
        
        'password.required' => 'Vui lòng nhập Password',
        'password.min'  => 'Password phải trên 6 ký tự',
        ];
    }
}
