<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Material extends Model
{
    protected $table='product_material';
    protected $primaryKey='material_pk_id';
    public $timestamps = false;

    public function getAll()
    {
        return $this->select('product_material.*','product_material.material_pk_id as mate_id')
                    ->orderBy('material_pk_id','desc')->paginate(10); 
    }
    public function getbyId($id)
    {
        return $this->where('material_pk_id',$id)->select('material_name','material_pk_id as mate_id')->first();
    }
    public function getBiggestId()
    {
        return $this->orderBy('material_pk_id','desc')->select('material_pk_id as mate_id')->limit(1)->first();
    }
    public function addMaterial($arrMate)
    {
        return $this->insert($arrMate);
    }
    public function UpdateMaterial($arr_mate,$id)
    {
        $mate = $this->findOrFail($id);
        $mate->material_name = $arr_mate['material_name'];
        return $mate->update();
    }
    // public function getOnebyName($material_name)
    // {
    //  return $this->select('material_pk_id')->where('material_name',$material_name)->first();
    // }
    public function DeleteMaterial($id)
    {
        $mate = $this->findOrFail($id);
        return $mate->delete();
    }
    public function Search($search_text,$search_choose)
    {
        $search =  $this->where('material_pk_id','like','%'.$search_text.'%')
                        ->orWhere('material_name','like','%'.$search_text.'%')
                        ->select('product_material.*','product_material.material_pk_id as mate_id')
                        ->orderBy('material_pk_id','desc')
                        ->paginate(5);
        return $search->appends(['search_text' => $search_text])->appends(['search_choose' => $search_choose]);
        //appends là hàm gán thêm search_text=$name ở trong URL
        //VD: search?page=2&search_text=Vòng
    }
}
