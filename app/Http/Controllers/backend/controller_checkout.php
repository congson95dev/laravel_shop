<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;
use Image;
use File;
use App\Model\Checkout;
use App\Model\Checkout_Detail;
use App\Model\Guests;

class controller_checkout extends Controller
{
    public function __construct(Checkout $checkout,Checkout_Detail $checkout_detail,Guests $guests)
    {
        $this->checkout = $checkout;
        $this->checkout_detail = $checkout_detail;
        $this->guests = $guests;
    }
    public function list_checkout()
    {
        $arr_checkout = $this->checkout->getAlljoinGuests();  
        return view('backend.view_list_checkout',compact('arr_checkout'));
    }
   
   
    public function delete_checkout($id)
    {
    	$this->checkout->DeleteCheckout($id);
        $this->checkout_detail->DeleteCheckoutDetailbyID($id);
        echo "<script type='text/javascript'>
        alert('Xóa đơn hàng thành công :<');
        window.location = '".url('list_checkout')."'
        </script>";
    }
    public function list_checkout_detail($id)
    {
        $arr_checkout_detail = $this->checkout_detail->getbyIdjoinProduct($id);
        return view('backend.view_list_checkout_detail',compact('arr_checkout_detail'));
    }
    public function delete_checkout_detail($id)
    {
        $arr_checkout_detail = $this->checkout_detail->getbyID($id);
        $checkout_id = $arr_checkout_detail->checkout_fk_id;
        // dd($checkout_id);
        $this->checkout_detail->DeleteCheckoutDetail($id);
        echo "<script type='text/javascript'>
        alert('Xóa chi tiết đơn hàng thành công :<');
        window.location = '".url('list_checkout_detail/'.$checkout_id)."'
        </script>";
    }
    public function checkout_status_change()
    {
        $checkout_status = Request::get('checkout_status');
        $checkout_id = Request::get('checkout_id');
        DB::table('shop_checkout')->where('checkout_pk_id',$checkout_id)->update(['checkout_status'=>$checkout_status]);
    }
}
