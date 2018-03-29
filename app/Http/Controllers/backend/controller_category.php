<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;
use Image;
use File;
use App\Model\Category;
use App\Model\Products;
use App\Http\Requests\Request_Add_Category;
use App\Http\Requests\Request_Update_Category;

class controller_category extends Controller
{
    public function __construct(Category $category,Products $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function list_category()
    {
        $arr_category = $this->category->getAll();
        return view('backend.view_list_category',compact('arr_category'));
    }
    public function add_category()
    {
    	return view('backend.view_add_category');
    }
    public function post_add_category(Request_Add_Category $req)
    {
    	$category_name = $req->category_name;

    	$category_pk_id_arr = $this->category->GetBiggestID();
    	$category_pk_id = $category_pk_id_arr->cate_id;
    	$category_pk_id = substr($category_pk_id,1,2);
    	$category_pk_id = $category_pk_id + 1;
    	$category_pk_id = 'c'.$category_pk_id;

    	$arrCat = ['category_pk_id'=>$category_pk_id,'category_name'=>$category_name];
    	// dd($arrProduct);
        
    	$result = $this->category->addCategory($arrCat);

    	if($result)
        {
            echo "<script type='text/javascript'>
            alert('Thêm danh mục thành công :D');
            window.location = '".url('list_category')."'
            </script>";
        }
    }
    public function update_category($id)
    {
        $arr_cat = $this->category->getbyId($id);
        return view('backend.view_update_category',compact('arr_cat'));
    }
    public function post_update_category(Request_Update_Category $req,$id)
    {
        $category_name = $req->category_name;
        $arr_cate = ['category_name'=>$category_name];
        $this->category->UpdateCat($arr_cate,$id);
        echo "<script type='text/javascript'>
        alert('Sửa danh mục thành công :O');
        window.location = '".url('list_category')."'
        </script>";
    }
    public function delete_category($id)
    {
    	$this->category->DeleteCat($id);
        echo "<script type='text/javascript'>
        alert('Xóa danh mục thành công :<');
        window.location = '".url('list_category')."'
        </script>";
    }
    public function view_product_category($id)
    {
        $arr_product = $this->product->getByCategoryId($id);
        return view('backend.view_list_product_category',compact('arr_product'));
    }
}
