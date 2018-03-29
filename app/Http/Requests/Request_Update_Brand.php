<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Update_Brand extends FormRequest
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
            'brand_name' => 'required',
            'brand_link' => 'required|active_url',
            'brand_img' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    public function messages()
    {
    return [
        'brand_name.required' => 'Vui lòng nhập tên hãng',

        'brand_link.required' => 'Vui lòng nhập đường dẫn hãng',
        'brand_link.active_url' => 'đường dẫn bạn vừa nhập chưa đúng định dạng (VD:https://www.facebook.com/)',

        'brand_img.image' => 'Vui lòng chọn file ảnh đúng định dạng',
        'brand_img.mimes' => 'Bạn nhập không đúng định dạng ảnh (jpeg,png,jpg,gif,svg)',
        ];
    }
}
