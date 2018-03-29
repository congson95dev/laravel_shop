<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Auth\Authenticatable;
//use Illuminate\Support\Facades\Input;
use Image;
use File;
use App\Model\Products;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Product_Attribute;
use App\Model\Product_Color;
use App\Model\Product_Material;
use App\Model\Checkout;
use App\Model\Users;

class controller_search extends Controller
{
	public function __construct(Products $product,Category $category,Brand $brand,Product_Attribute $product_att,Product_Color $product_color,Product_Material $product_material,Checkout $checkout,Users $users)
	{
		$this->product = $product;
		$this->category = $category;
		$this->brand = $brand;
        $this->product_att = $product_att;
        $this->product_color = $product_color;
        $this->product_material = $product_material;
        $this->checkout = $checkout;
        $this->users = $users;
	}
	
	public function search_choose(Request $req)
	{
		$search_choose = $req->search_choose;
		$search_text = $req->search_text;
		if($search_choose == 'Đơn Hàng')
		{
			$arr_search = $this->checkout->Search($search_text,$search_choose);
			$count = $arr_search->count();
        	return view('backend.view_search_checkout',compact('arr_search','search_text','count'));
		}
		else if($search_choose == 'Nhân Sự')
		{
			$arr_search = $this->users->Search($search_text,$search_choose);
			$count = $arr_search->count();
        	return view('backend.view_search_admin',compact('arr_search','search_text','count'));
		}
		
		else if($search_choose == 'Danh Mục')
		{
			$arr_search = $this->category->Search($search_text,$search_choose);
			$count = $arr_search->count();
        	return view('backend.view_search_category',compact('arr_search','search_text','count'));
		}
		else if($search_choose == 'Hãng')
		{
			$arr_search = $this->brand->Search($search_text,$search_choose);
			$count = $arr_search->count();
        	return view('backend.view_search_brand',compact('arr_search','search_text','count'));
		}
		else if($search_choose == 'Nguyên Liệu')
		{
			$arr_search = $this->product_material->Search($search_text,$search_choose);
			$count = $arr_search->count();
        	return view('backend.view_search_product_material',compact('arr_search','search_text','count'));
		}
		else if($search_choose == 'Màu Sắc')
		{
			$arr_search = $this->product_color->Search($search_text,$search_choose);
			$count = $arr_search->count();
        	return view('backend.view_search_product_color',compact('arr_search','search_text','count'));
		}
		else if($search_choose == 'Sản Phẩm' || $search_choose=='')
		{
			$arr_search = $this->product->Search($search_text,$search_choose);
			$count = $arr_search->count();
        	return view('backend.view_search_product',compact('arr_search','search_text','count'));
		}
	}
}