<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Add_Product_Color extends FormRequest
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
            'color_name' => 'required|unique:product_color',
            
        ];
    }
    public function messages()
    {
    return [
        'color_name.required' => 'Vui lòng nhập tên màu sắc sản phẩm',
        'color_name.unique' => 'màu sắc sản phẩm này đã tồn tại'
        
        ];
    }
}
