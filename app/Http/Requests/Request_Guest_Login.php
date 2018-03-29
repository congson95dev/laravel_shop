<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Guest_Login extends FormRequest
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
            'gl_email' => 'required|email',
            'gl_password' => 'required|min:6',
         
        ];
    }
    public function messages()
    {
    return [
        'gl_email.required' => 'Vui lòng nhập Email',
        'gl_email.email' => 'Không đúng định dạng E-mail',
        
        'gl_password.required'  => 'Vui lòng nhập Password',
        'gl_password.min'  => 'Password phải trên 6 ký tự',

        ];
    }
}
