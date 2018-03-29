<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class controller_category extends Controller
{
	public function category_detail($id)
	{
		 $data["arr_category"]=DB::table("shop_products")->where("category_fk_id","=","$id")->paginate(9);
   		 return view("frontend.shop-cart.category_products",$data);
    }
}
