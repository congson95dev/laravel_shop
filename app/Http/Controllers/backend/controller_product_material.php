<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;
use Image;
use File;
use App\Model\Product_Material;
use App\Http\Requests\Request_Add_Product_Material;
use App\Http\Requests\Request_Update_Product_Material;

class controller_product_material extends Controller
{
    public function __construct(Product_Material $material)
    {
        $this->material = $material;
    }
    public function list_material()
    {
        $arr_material = $this->material->getAll();
        return view('backend.view_list_product_material',compact('arr_material'));
    }
    public function add_material()
    {
    	return view('backend.view_add_product_material');
    }
    public function post_add_material(Request_Add_Product_Material $req)
    {
    	$material_name = $req->material_name;

    	$arrMate = ['material_name'=>$material_name];
    	// dd($arrProduct);
        
    	$result = $this->material->addMaterial($arrMate);

    	if($result)
        {
            echo "<script type='text/javascript'>
            alert('Thêm nguyên liệu sản phẩm thành công :D');
            window.location = '".url('list_product_material')."'
            </script>";
        }
    }
    public function update_material($id)
    {
        $arr_mate = $this->material->getbyId($id);
        return view('backend.view_update_product_material',compact('arr_mate'));
    }
    public function post_update_material(Request_Update_Product_Material $req,$id)
    {
        $material_name = $req->material_name;
        $arr_mate = ['material_name'=>$material_name];
        $this->material->UpdateMaterial($arr_mate,$id);
        echo "<script type='text/javascript'>
        alert('Sửa nguyên liệu sản phẩm thành công :O');
        window.location = '".url('list_product_material')."'
        </script>";
    }
    public function delete_material($id)
    {
    	$this->material->DeleteMaterial($id);
        echo "<script type='text/javascript'>
        alert('Xóa nguyên liệu sản phẩm thành công :<');
        window.location = '".url('list_product_material')."'
        </script>";
    }
}
