<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Add_Category extends FormRequest
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
            'category_name' => 'required|unique:shop_category',
            
        ];
    }
    public function messages()
    {
    return [
        'category_name.required' => 'Vui lòng nhập tên danh mục',
        'category_name.unique' => 'Danh mục này đã tồn tại'
        
        ];
    }
}
