<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Checkout extends FormRequest
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
            'place' => 'required',
            'mobile_number' => 'required|numeric|digits_between:11,11'
        ];
    }
    public function messages()
    {
    return [
        'place.required' => 'Vui lòng nhập nơi gửi hàng',
               
        'mobile_number.required'  => 'Vui lòng nhập số điện thoại',
        'mobile_number.numeric'  => 'Số điện thoại này không phù hợp',
        'mobile_number.digits_between'  => 'Số điện thoại cần đủ 11 số'

        ];
    }
}
