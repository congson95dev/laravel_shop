<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
	protected $table='shop_checkout';
    protected $primaryKey='checkout_pk_id';
    public $timestamps = false;

    public function getAll()
    {
        return $this->select('shop_checkout.*','shop_checkout.checkout_pk_id as checkout_id')
                    ->orderBy('checkout_pk_id','desc')
                    ->paginate(10);
    }
    public function getAlljoinGuests()
    {
    	return $this->join('guests','guests.guest_pk_id','=','shop_checkout.guest_fk_id')
    	            ->select('shop_checkout.*','shop_checkout.checkout_pk_id as checkout_id','guests.*')
    	            ->orderBy('checkout_pk_id','desc')
    	            ->paginate(10); 
    }
    public function getByGuestID($guest_id)
    {
        return $this->where('guest_fk_id',$guest_id)
                    ->orderBy('checkout_pk_id','desc')
                    ->paginate(10);
    }
    public function DeleteCheckout($id)
    {
    	$checkout = $this->findOrFail($id);
    	$checkout->delete();
    }
    public function Search($search_text,$search_choose)
    {
        $search =  $this->join('guests','guests.guest_pk_id','=','guest_fk_id')
                        ->where('guests.guest_firstname','like','%'.$search_text.'%')
                        ->orWhere('guests.guest_lastname','like','%'.$search_text.'%')
                        ->orWhere('guests.guest_email','like','%'.$search_text.'%')
                        ->orWhere('checkout_place','like','%'.$search_text.'%')
                        ->orWhere('checkout_mobile_number','like','%'.$search_text.'%')
                        ->orWhere('checkout_totalprice','like','%'.$search_text.'%')
                        ->select('guests.*','shop_checkout.*','shop_checkout.checkout_pk_id as checkout_id')
                        ->orderBy('checkout_pk_id','desc')
                        ->paginate(10);
        return $search->appends(['search_text' => $search_text])->appends(['search_choose' => $search_choose]);
        //appends là hàm gán thêm search_text=$name ở trong URL
        //VD: search?page=2&search_text=Vòng
    }
    
    
}