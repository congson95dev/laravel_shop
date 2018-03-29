<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	protected $table='shop_brand';
	protected $primaryKey='brand_pk_id';
    public $timestamps = false;

    public function getAll()
    {
    	return $this->select('shop_brand.*','shop_brand.brand_pk_id as brand_id')->orderBy('brand_pk_id','desc')->paginate(10); 
    }
    public function getbyId($id)
    {
        return $this->where('brand_pk_id',$id)->select('shop_brand.*','shop_brand.brand_pk_id as brand_id')->first();
    }
    public function addBrand($arrBrand)
    {
        return $this->insert($arrBrand);
    }
    public function UpdateBrand($arr_brand,$id)
    {
        $brand = $this->findOrFail($id);
        $brand->brand_name = $arr_brand["brand_name"];
        $brand->brand_img = $arr_brand["brand_img"];
        $brand->brand_link = $arr_brand["brand_link"];
        return $brand->update();
    }
    public function DeleteBrand($id)
    {
        $brand = $this->findOrFail($id);
        return $brand->delete();
    }

    public function Search($search_text,$search_choose)
    {
        $search =  $this->where('brand_name','like','%'.$search_text.'%')
                        ->orWhere('brand_link','like','%'.$search_text.'%')
                        ->orderBy('brand_pk_id','desc')
                        ->paginate(5);
        return $search->appends(['search_text' => $search_text])->appends(['search_choose' => $search_choose]);
        //appends là hàm gán thêm search_text=$name ở trong URL
        //VD: search?page=2&search_text=Vòng
    }
}