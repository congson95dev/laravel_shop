<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
// use Illuminate\Http\Request;
use Request;
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
use App\Http\Requests\Request_Add_Product;
use App\Http\Requests\Request_Update_Product;

class controller_product extends Controller
{
	public function __construct(Products $product,Category $category,Brand $brand,Product_Attribute $product_att,Product_Color $product_color,Product_Material $product_material)
	{
		$this->product = $product;
		$this->category = $category;
		$this->brand = $brand;
        $this->product_att = $product_att;
        $this->product_color = $product_color;
        $this->product_material = $product_material;
	}
    public function main()
    {   
       $arr = $this->product->getAllJoinCategory();
       // dd($arr);
       return view('backend.view_main',compact('arr'));
    }
    public function list_product()
    {	
       $arr = $this->product->getAllJoinCategory();
       // dd($arr);
       return view('backend.view_list_product',compact('arr'));
    }
    public function add_product()
    {
    	$arr_cat = $this->category->getAll();
    	$arr_brand = $this->brand->getAll();
        $arr_color = $this->product_color->getAll();
        $arr_material = $this->product_material->getAll();
    	return view('backend.view_add_product',compact('arr_cat','arr_brand','arr_color','arr_material'));
    }
    public function post_add_product(Request_Add_Product $req)
    {
    	$product_name = $req->product_name;
    	$category_name = $req->category_name;
    	$product_description = $req->product_description;
    	$product_content = $req->product_content;
    	$product_image = $req->product_image;
    	$product_price = $req->product_price;
    	$product_stock = $req->product_stock;
    	$product_style = $req->product_style;
    	$product_season = $req->product_season;
    	$product_usage = $req->product_usage;
    	$product_sport = $req->product_sport;
    	$product_brand = $req->product_brand;
    	$product_top_huge = $req->product_top_huge;
    	$product_featured = $req->product_featured;
    	$product_comming = $req->product_comming;
        $att_color_arr = $req->att_color;
        $att_material_arr = $req->att_material;
        // dd($att_color_arr);


    	//nhập vào là category name , insert vào db là category_fk_id
    	$category_id_arr = DB::table('shop_category')->select('category_pk_id')->where('category_name',$category_name)->first();
    	$category_fk_id = $category_id_arr->category_pk_id;
    	// dd($category_fk_id);
    	
    	//nhập vào là không hoặc có , insert vào db là 0 hoặc 1
    	$product_top_huge = ($product_top_huge == 'Không')?0:1;
    	$product_featured = ($product_featured == 'Không')?0:1;
    	$product_comming = ($product_comming == 'Không')?0:1;

    	//auto increment product_pk_id thủ công :v 
    	$product_pk_id_arr = $this->product->GetBiggestID();
    	$product_pk_id = $product_pk_id_arr->product_id;
    	$product_pk_id = substr($product_pk_id,1,2);
    	$product_pk_id = $product_pk_id + 1;
    	$product_pk_id = 'p'.$product_pk_id;
    	// dd($product_pk_id);
    	
    	// upload image, nếu ko có ảnh thì set là default
    	if($req->hasFile('product_image'))
        {
            $product_image = $req->file('product_image');
            $imageName = time().'.'.$req->product_image->getClientOriginalName();
            Image::make($product_image)->resize(276, 357)->save(public_path('/assets/img/product/'.$imageName));
        }   
        else
        {
            $imageName = 'default_product.jpg';
        }  
        // dd($imageName);
    	$arrProduct = ['product_pk_id'=>$product_pk_id,'product_name'=>$product_name,'category_fk_id'=>$category_fk_id,'product_description'=>$product_description,'product_content'=>$product_content,'product_img'=>$imageName,'product_price'=>$product_price,'product_stock'=>$product_stock,'product_style'=>$product_style,'product_season'=>$product_season,'product_usage'=>$product_usage,'product_sport'=>$product_sport,'product_brand'=>$product_brand,'product_top_huge'=>$product_top_huge,'product_featured'=>$product_featured,'product_comming'=>$product_comming];
    	// dd($arrProduct);
        
    	$result = $this->product->addProduct($arrProduct);
        // dd($att_color_arr);
        
        // mỗi nguyên liệu có nhiều màu
        foreach($att_material_arr as $key => $att_material_rows)
        {
                    foreach($att_color_arr as $key => $att_color_rows)
                    {
                        //auto increment att_pk_id thủ công :v 
                        $att_pk_id_arr = $this->product_att->GetBiggestID();
                        // dd($att_pk_id_arr);
                        $att_pk_id = $att_pk_id_arr->att_id;
                        // dd($att_pk_id);
                        $att_pk_id = substr($att_pk_id,1,2);
                        
                        $att_pk_id = $att_pk_id + 1;
                        $att_pk_id = 'a'.$att_pk_id;

                        $att = ['att_pk_id'=>$att_pk_id,'product_fk_id'=>$product_pk_id,'att_material'=>$att_material_rows,'att_color'=>$att_color_rows];
                        // dd($att_color);
                        $this->product_att->AddProductAtt($att);
                    }
        }
        // dd($att_material_arr);
        // foreach($att_material_arr as $key => $att_material_rows )
        // {
        //     $att_material = ['att_material'=>$att_material_rows];
        //     $this->product_att->UpdateMaterialProductAtt($att_material,$att_pk_id);
        // }

        if($result)
        {
            echo "<script type='text/javascript'>
            alert('Thêm sản phẩm thành công :D');
            window.location = '".url('list_products')."'
            </script>";
        }
    }
    public function add_product_category()
    {
        $category_id = Request::get('category_id');
        $cat = $this->category->getbyId($category_id);
        $arr_brand = $this->brand->getAll();
        $arr_color = $this->product_color->getAll();
        $arr_material = $this->product_material->getAll();
        return view('backend.view_add_product',compact('cat','arr_brand','arr_color','arr_material'));
    }
    
    public function update_product($id)
    {
        $arr_product = $this->product->getById($id);
        $cat_id=$arr_product->category_fk_id;
        // dd($cat_id);
        $arr_cat = $this->category->getAll();
        $catById = $this->category->getbyId($cat_id);
        $arr_brand = $this->brand->getAll();
        $arr_product_att = $this->product_att->getByproductId($id);
        $arr_color = $this->product_color->getAll();
        $arr_material = $this->product_material->getAll();
        return view('backend.view_update_product',compact('arr_product','arr_cat','arr_brand','catById','arr_product_att','arr_color','arr_material'));
    }
    public function post_update_product(Request_Update_Product $req,$id)
    {
        $product_name = $req->product_name;
        $category_name = $req->category_name;
        $product_description = $req->product_description;
        $product_content = $req->product_content;
        $product_image = $req->product_image;
        $product_price = $req->product_price;
        $product_stock = $req->product_stock;
        $product_style = $req->product_style;
        $product_season = $req->product_season;
        $product_usage = $req->product_usage;
        $product_sport = $req->product_sport;
        $product_brand = $req->product_brand;
        $product_top_huge = $req->product_top_huge;
        $product_featured = $req->product_featured;
        $product_comming = $req->product_comming;
        $att_color_arr = $req->att_color;
        $att_material_arr = $req->att_material;
        // dd($att_color_arr);


        //nhập vào là category name , insert vào db là category_fk_id
        $category_id_arr = DB::table('shop_category')->select('category_pk_id')->where('category_name',$category_name)->first();
        $category_fk_id = $category_id_arr->category_pk_id;
        // dd($category_fk_id);
        
        //nhập vào là không hoặc có , insert vào db là 0 hoặc 1
        $product_top_huge = ($product_top_huge == 'Không')?0:1;
        $product_featured = ($product_featured == 'Không')?0:1;
        $product_comming = ($product_comming == 'Không')?0:1;

        //auto increment product_pk_id thủ công :v 
        // $product_pk_id_arr = $this->product->GetBiggestID();
        // $product_pk_id = $product_pk_id_arr->product_id;
        // $product_pk_id = substr($product_pk_id,1,2);
        // $product_pk_id = $product_pk_id + 1;
        // $product_pk_id = 'p'.$product_pk_id;
        // dd($product_pk_id);
        
        // upload image, nếu ko có ảnh thì set là default
        $arr_old_image = $this->product->getById($id);
        // dd($arr_old_image);
        $imageName = $arr_old_image['product_img'];
        // dd($imageName);

        if($req->hasFile('product_image'))
        {
            if($imageName != 'default_product.jpg')
            {
                File::delete(public_path('/assets/img/product/'.$imageName));
            }
            $product_image = $req->file('product_image');
            $imageName = time().'.'.$req->product_image->getClientOriginalName();
            Image::make($product_image)->resize(276, 357)->save(public_path('/assets/img/product/'.$imageName));
        }   
        
        // dd($imageName);
        $arrProduct = ['product_name'=>$product_name,'category_fk_id'=>$category_fk_id,'product_description'=>$product_description,'product_content'=>$product_content,'product_img'=>$imageName,'product_price'=>$product_price,'product_stock'=>$product_stock,'product_style'=>$product_style,'product_season'=>$product_season,'product_usage'=>$product_usage,'product_sport'=>$product_sport,'product_brand'=>$product_brand,'product_top_huge'=>$product_top_huge,'product_featured'=>$product_featured,'product_comming'=>$product_comming];
        // dd($arrProduct);
        
        $result = $this->product->updateProduct($arrProduct,$id);
        // dd($att_color_arr);
        
        // mỗi nguyên liệu có nhiều màu
        $this->product_att->DeleteAtt($id);
        foreach($att_material_arr as $key => $att_material_rows)
        {
                    foreach($att_color_arr as $key => $att_color_rows)
                    {
                        //auto increment att_pk_id thủ công :v 
                        $att_pk_id_arr = $this->product_att->GetBiggestID();
                        // dd($att_pk_id_arr);
                        $att_pk_id = $att_pk_id_arr->att_id;
                        // dd($att_pk_id);
                        $att_pk_id = substr($att_pk_id,1,2);
                        
                        $att_pk_id = $att_pk_id + 1;
                        $att_pk_id = 'a'.$att_pk_id;

                        $att = ['att_pk_id'=>$att_pk_id,'product_fk_id'=>$id,'att_material'=>$att_material_rows,'att_color'=>$att_color_rows];
                        // dd($att_color);
                        $this->product_att->AddProductAtt($att);
                    }
        }
       

        if($result)
        {
            echo "<script type='text/javascript'>
            alert('Sửa sản phẩm thành công :D');
            window.location = '".url('list_products')."'
            </script>";
        }
    }
    public function delete_product($id)
    {
        $arr_old_image = $this->product->getById($id);
        // dd($arr_old_image);
        $imageName = $arr_old_image['product_img'];
        // dd($imageName);
        File::delete(public_path('/assets/img/product/'.$imageName));

        $this->product->DeleteProduct($id);
        $this->product_att->DeleteAtt($id);

        echo "<script type='text/javascript'>
        alert('Xóa sản phẩm thành công :<');
        window.location = '".url('list_products')."'
        </script>";
    }
    
}