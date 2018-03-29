<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	protected $table='shop_products';
    protected $primaryKey='product_pk_id';
    public $timestamps = false;

    
    public function getAllJoinCategory()
    {
    	return $this->join('shop_category','shop_category.category_pk_id','=','shop_products.category_fk_id')
                    ->select('shop_category.category_name as category_name','shop_products.*','shop_products.product_pk_id as product_id')
    				->orderBy('product_pk_id','desc')->paginate(5);
    }
    //phải đặt product_pk_id thành tên khác thì mới update/delete được thông qua product_pk_id
    public function getById($id)
    {
    	return $this->where('product_pk_id',$id)->select('shop_products.*','shop_products.product_pk_id as product_id')->first();
    }
    public function getByCategoryId($id)
    {
        return $this->where('category_fk_id',$id)->select('shop_products.*','shop_products.product_pk_id as product_id')->paginate(5);
    }
    public function GetBiggestID()
    {
        return $this->select('product_pk_id as product_id')->orderBy('product_pk_id','desc')->limit(1)->first();
    }
    public function addProduct($arrProduct)
    {
        return $this->insert($arrProduct);
    }
    public function updateProduct($arrProduct,$id)
    {
        $product = $this->findOrFail($id);
        $product->product_name = $arrProduct['product_name'];
        $product->category_fk_id = $arrProduct['category_fk_id'];
        $product->product_description = $arrProduct['product_description'];
        $product->product_content = $arrProduct['product_content'];
        $product->product_img = $arrProduct['product_img'];
        $product->product_price = $arrProduct['product_price'];
        $product->product_stock = $arrProduct['product_stock'];
        $product->product_style = $arrProduct['product_style'];
        $product->product_season = $arrProduct['product_season'];
        $product->product_usage = $arrProduct['product_usage'];
        $product->product_sport = $arrProduct['product_sport'];
        $product->product_brand = $arrProduct['product_brand'];
        $product->product_top_huge = $arrProduct['product_top_huge'];
        $product->product_featured = $arrProduct['product_featured'];
        $product->product_comming = $arrProduct['product_comming'];
        return $product->update();
    }
    public function DeleteProduct($id)
    {
        $product = $this->findOrFail($id);
        // dd($product);
        return $product->delete();
    }
    public function Search($search_text,$search_choose)
    {
        $search =  $this->join('shop_category','shop_category.category_pk_id','=','category_fk_id')
                        ->where('product_name','like','%'.$search_text.'%')
                        ->orWhere('shop_category.category_name','like','%'.$search_text.'%')
                        ->orWhere('product_description','like','%'.$search_text.'%')
                        ->orWhere('product_brand','like','%'.$search_text.'%')
                        ->orWhere('product_price','like','%'.$search_text.'%')
                        ->orderBy('product_pk_id','desc')
                        ->paginate(5);
        return $search->appends(['search_text' => $search_text])->appends(['search_choose' => $search_choose]);
        //appends là hàm gán thêm search_text=$name ở trong URL
        //VD: search?page=2&search_text=Vòng
    }
}