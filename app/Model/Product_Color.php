<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Color extends Model
{
    protected $table='product_color';
    protected $primaryKey='color_pk_id';
    public $timestamps = false;

    public function getAll()
    {
        return $this->select('product_color.*','product_color.color_pk_id as color_id')->orderBy('color_pk_id','desc')->paginate(10); 
    }
    public function getbyId($id)
    {
        return $this->where('color_pk_id',$id)->select('color_name','color_pk_id as color_id')->first();
    }
    public function getBiggestId()
    {
        return $this->orderBy('color_pk_id','desc')->select('color_pk_id as color_id')->limit(1)->first();
    }
    public function addcolor($arrColor)
    {
        return $this->insert($arrColor);
    }
    public function UpdateColor($arr_color,$id)
    {
        $color = $this->findOrFail($id);
        $color->color_name = $arr_color['color_name'];
        return $color->update();
    }
    // public function getOnebyName($color_name)
    // {
    //  return $this->select('color_pk_id')->where('color_name',$color_name)->first();
    // }
    public function DeleteColor($id)
    {
        $color = $this->findOrFail($id);
        return $color->delete();
    }

    public function Search($search_text,$search_choose)
    {
        $search =  $this->where('color_pk_id','like','%'.$search_text.'%')
                        ->orWhere('color_name','like','%'.$search_text.'%')
                        ->select('product_color.*','product_color.color_pk_id as color_id')
                        ->orderBy('color_pk_id','desc')
                        ->paginate(5);
        return $search->appends(['search_text' => $search_text])->appends(['search_choose' => $search_choose]);
        //appends là hàm gán thêm search_text=$name ở trong URL
        //VD: search?page=2&search_text=Vòng
    }
}
