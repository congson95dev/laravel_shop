<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Update_Guest extends FormRequest
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
            'guest_firstname' => 'required',
            'guest_lastname' => 'required',
            'guest_email' => 'required|email',
        ];
    }
    public function messages()
    {
    return [
        'guest_firstname.required' => 'Vui lòng nhập Họ',
        
        'guest_lastname.required' => 'Vui lòng nhập Tên',

        'guest_email.required' => 'Vui lòng nhập E-mail',
        'guest_email.email' => 'E-mail bạn nhập không đúng định dạng',
        ];
    }
}
