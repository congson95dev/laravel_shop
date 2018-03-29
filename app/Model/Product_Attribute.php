<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Attribute extends Model
{
	protected $table='shop_product_attribute';
	protected $primaryKey ='att_pk_id';
    public $timestamps = false;

    public function getAll()
    {
    	return $this->orderBy('att_pk_id','desc')->paginate(5); 
    }
    public function GetBiggestID()
    {
    	return $this->orderBy('att_pk_id','desc')->select('att_pk_id as att_id')->limit(1)->first();
    }
    public function getByproductId($id)
    {
        return $this->where('product_fk_id',$id)->get();
    }
    public function AddProductAtt($att)
    {
    	return $this->insert($att);
    }
    public function UpdateProductAtt($att,$id)
    {
        $product_att = $this->findOrFail($id);
        $product_att->att_material = $att['att_material'];
        $product_att->att_color = $att['att_color'];
        return $product_att->update();
    }
    public function DeleteAtt($product_fk_id)
    {
        return  $att = $this->where('product_fk_id','=',$product_fk_id)->delete();
    }
    
}
