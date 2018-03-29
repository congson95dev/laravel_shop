<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Add_Product_Material extends FormRequest
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
            'material_name' => 'required|unique:product_material',
            
        ];
    }
    public function messages()
    {
    return [
        'material_name.required' => 'Vui lòng nhập tên nguyên liệu sản phẩm',
        'material_name.unique' => 'Nguyên liệu sản phẩm này đã tồn tại'
        
        ];
    }
}
