<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_voucher extends FormRequest
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
            "voucher_code"=>"required|min:8|max:8",
        ];
    }
    public function messages()
    {
        return [
            "voucher_code.required"=>"Bạn cần nhập mã voucher !",
            "voucher_code.min"=>"Mã voucher mặc định 8 ký tự",
            "voucher_code.max"=>"Mã voucher mặc định 8 ký tự",
        ];
    }
}
