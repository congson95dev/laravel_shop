<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table='shop_category';
    protected $primaryKey='category_pk_id';
    public $timestamps = false;

    public function getAll()
    {
    	return $this->select('shop_category.*','shop_category.category_pk_id as cate_id')->orderBy('category_pk_id','desc')->paginate(10); 
    }
    public function getbyId($id)
    {
        return $this->where('category_pk_id',$id)->select('category_name','category_pk_id as cate_id')->first();
    }
    public function getBiggestId()
    {
        return $this->orderBy('category_pk_id','desc')->select('category_pk_id as cate_id')->limit(1)->first();
    }
    public function addCategory($arrCat)
    {
        return $this->insert($arrCat);
    }
    public function UpdateCat($arr_cate,$id)
    {
        $cat = $this->findOrFail($id);
        $cat->category_name = $arr_cate['category_name'];
        return $cat->update();
    }
    // public function getOnebyName($category_name)
    // {
    // 	return $this->select('category_pk_id')->where('category_name',$category_name)->first();
    // }
    public function DeleteCat($id)
    {
        $cat = $this->findOrFail($id);
        return $cat->delete();
    }

    public function Search($search_text,$search_choose)
    {
        $search =  $this->where('category_pk_id','like','%'.$search_text.'%')
                        ->orWhere('category_name','like','%'.$search_text.'%')
                        ->select('shop_category.*','shop_category.category_pk_id as cate_id')
                        ->orderBy('category_pk_id','desc')
                        ->paginate(5);
        return $search->appends(['search_text' => $search_text])->appends(['search_choose' => $search_choose]);
        //appends là hàm gán thêm search_text=$name ở trong URL
        //VD: search?page=2&search_text=Vòng
    }
}
