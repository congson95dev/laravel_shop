<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Checkout_Detail extends Model
{
	protected $table='shop_checkout_detail';
    protected $primaryKey='checkout_detail_pk_id';
    public $timestamps = false;

    public function getbyIdjoinProduct($id)
    {
    	return $this->where('checkout_fk_id',$id)
    				->join('shop_products','shop_products.product_pk_id','=','shop_checkout_detail.product_fk_id')
    	            ->select('shop_checkout_detail.*','shop_checkout_detail.checkout_detail_pk_id as checkout_detail_id',
    	        	'shop_products.*')
    	        	->orderBy('shop_checkout_detail.checkout_detail_pk_id','desc')
    	            ->paginate(5);
    }
    public function DeleteCheckoutDetailbyID($id)
    {
    	$c_detail=$this->where('checkout_fk_id',$id);
    	return $c_detail->delete();
    }
    public function DeleteCheckoutDetail($id)
    {
    	$c_detail=$this->findOrFail($id);
    	return $c_detail->delete();
    }
    public function getbyID($id)
    {
    	return $this->findOrFail($id);
    }
}