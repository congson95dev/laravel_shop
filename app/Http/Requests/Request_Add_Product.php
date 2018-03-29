<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request_Add_Product extends FormRequest
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
            'product_name' => 'required',
            'product_description' => 'required',
            'product_content' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
            'product_sport' => 'nullable|numeric|digits_between:9,9',
            //nullable cho phép null , ko cần phải required cái ko cần thiết 
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'att_color' => 'required',
            'att_material' => 'required',
        ];
    }
    public function messages()
    {
    return [
        'product_name.required' => 'Vui lòng nhập tên sản phẩm',

        'product_description.required' => 'Vui lòng nhập miêu tả sản phẩm',

        'product_content.required' => 'Vui lòng nhập nội dung sản phẩm',

        'product_price.required' => 'Vui lòng nhập giá sản phẩm',

        'product_stock.required' => 'Vui lòng nhập số lượng sản phẩm',

        'product_sport.numeric' => 'Mã thể thao chưa được nhập đúng định dạng',
        'product_sport.digits_between' => 'Mã thể thao gồm 9 ký tự',

        'product_image.image' => 'Vui lòng chọn file ảnh đúng định dạng',
        'product_image.mimes' => 'Bạn nhập không đúng định dạng ảnh (jpeg,png,jpg,gif,svg)',

        'att_color.required' => 'Vui lòng nhập màu sắc của sản phẩm',
        'att_material.required' => 'Vui lòng nhập chất liệu của sản phẩm',
        ];
    }
}
