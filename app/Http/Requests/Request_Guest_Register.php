<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Guest_Register extends FormRequest
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
            
            'g_email' => 'required|email|unique:guests,guest_email',
            'g_password' => 'required|min:6',
            'firstname' => 'required',
            'lastname' => 'required',
        
            //
        ];
    }
    public function messages()
{
    return [
        'g_email.required' => 'Vui lòng nhập Email',
        'g_email.email' => 'Không đúng định dạng E-mail',
        'g_email.unique' => 'E-mail này đã có người sử dụng',

        'g_password.required'  => 'Vui lòng nhập Password',
        'g_password.min'=>'Mật khẩu ít nhất 6 ký tự',
        
        'firstname.required' => 'Vui lòng nhập Họ',
        'lastname.required' => 'Vui lòng nhập Tên',
     

    ];
}
}
