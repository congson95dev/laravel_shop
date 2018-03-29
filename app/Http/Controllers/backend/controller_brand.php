<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;
use Image;
use File;
use App\Model\Brand;
use App\Http\Requests\Request_Add_Brand;
use App\Http\Requests\Request_Update_Brand;

class controller_brand extends Controller
{
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
    public function list_brand()
    {
        $arr_brand = $this->brand->getAll();
        return view('backend.view_list_brand',compact('arr_brand'));
    }
    public function add_brand()
    {
    	return view('backend.view_add_brand');
    }
    public function post_add_brand(Request_Add_Brand $req)
    {
    	$brand_name = $req->brand_name;
        $brand_img = $req->brand_img;
        $brand_link = $req->brand_link;

        if($req->hasFile('brand_img'))
        {
            $brand_img = $req->file('brand_img');
            $imageName = time().'.'.$req->brand_img->getClientOriginalName();
            Image::make($brand_img)->resize(120, 45)->save(public_path('/assets/img/brand/'.$imageName));
        }   
         

    	$arrBrand = ['brand_name'=>$brand_name,'brand_img'=>$imageName,'brand_link'=>$brand_link];
    	// dd($arrProduct);
        
    	$result = $this->brand->addBrand($arrBrand);

    	if($result)
        {
            echo "<script type='text/javascript'>
            alert('Thêm hãng thành công :D');
            window.location = '".url('list_brand')."'
            </script>";
        }
    }
    public function update_brand($id)
    {
        $arr_brand = $this->brand->getbyId($id);
        return view('backend.view_update_brand',compact('arr_brand'));
    }
    public function post_update_brand(Request_Update_Brand $req,$id)
    {
        $brand_name = $req->brand_name;
        $brand_img = $req->brand_img;
        $brand_link = $req->brand_link;

        $arr_old_image = $this->brand->getById($id);
        // dd($arr_old_image);
        $imageName = $arr_old_image['brand_img'];
        // dd($imageName);

        if($req->hasFile('brand_img'))
        {
            File::delete(public_path('/assets/img/brand/'.$imageName));
            $brand_img = $req->file('brand_img');
            $imageName = time().'.'.$req->brand_img->getClientOriginalName();
            Image::make($brand_img)->resize(120, 45)->save(public_path('/assets/img/brand/'.$imageName));
        }
        else
        {
            $imageName = $arr_old_image['brand_img'];
        }
         
        // dd($imageName);

        $arr_brand = ['brand_name'=>$brand_name,'brand_img'=>$imageName,'brand_link'=>$brand_link];
        $this->brand->UpdateBrand($arr_brand,$id);
        echo "<script type='text/javascript'>
        alert('Sửa hãng thành công :O');
        window.location = '".url('list_brand')."'
        </script>";
    }
    public function delete_brand($id)
    {
        $arr_old_image = $this->brand->getbyId($id);
        $imageName = $arr_old_image['brand_img'];
        File::delete(public_path('/assets/img/brand/'.$imageName));

    	$this->brand->DeleteBrand($id);
        echo "<script type='text/javascript'>
        alert('Xóa hãng thành công :<');
        window.location = '".url('list_brand')."'
        </script>";
    }
}
