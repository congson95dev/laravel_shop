<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;
use Image;
use File;
use App\Model\Product_Color;
use App\Http\Requests\Request_Add_Product_Color;
use App\Http\Requests\Request_Update_Product_Color;

class controller_product_color extends Controller
{
    public function __construct(Product_Color $color)
    {
        $this->color = $color;
    }
    public function list_color()
    {
        $arr_color = $this->color->getAll();
        return view('backend.view_list_product_color',compact('arr_color'));
    }
    public function add_color()
    {
    	return view('backend.view_add_product_color');
    }
    public function post_add_color(Request_Add_Product_color $req)
    {
    	$color_name = $req->color_name;

    	$arrColor = ['color_name'=>$color_name];
    	// dd($arrProduct);
        
    	$result = $this->color->addcolor($arrColor);

    	if($result)
        {
            echo "<script type='text/javascript'>
            alert('Thêm nguyên liệu sản phẩm thành công :D');
            window.location = '".url('list_product_color')."'
            </script>";
        }
    }
    public function update_color($id)
    {
        $arr_color = $this->color->getbyId($id);
        return view('backend.view_update_product_color',compact('arr_color'));
    }
    public function post_update_color(Request_Update_Product_color $req,$id)
    {
        $color_name = $req->color_name;
        $arr_color = ['color_name'=>$color_name];
        $this->color->Updatecolor($arr_color,$id);
        echo "<script type='text/javascript'>
        alert('Sửa nguyên liệu sản phẩm thành công :O');
        window.location = '".url('list_product_color')."'
        </script>";
    }
    public function delete_color($id)
    {
    	$this->color->Deletecolor($id);
        echo "<script type='text/javascript'>
        alert('Xóa nguyên liệu sản phẩm thành công :<');
        window.location = '".url('list_product_color')."'
        </script>";
    }
}
