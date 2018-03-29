<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use Request;
use Session;
use DB;
use Cart;
use App\Http\Requests\Request_Checkout;
use App\Model\Shop_Ship_County;

class controller_cart extends Controller
{
    function list_cart()
    {   
        $data["ship"] = DB::table('shop_ship')->get();
    	return view('frontend.shop-cart.cart',$data);
    }
    // function add_to_cart($id)
    // {
    // 		$product=DB::select("select * from shop_products where product_pk_id='$id'");
    //         $att_product=DB::table("shop_products")
    //                             ->join('shop_product_attribute','shop_products.product_pk_id','=','shop_product_attribute.product_fk_id')
    //                             ->where("product_pk_id","=","$id")->first();
    // 		foreach ($product as $rows) {
    // 				$product_name=$rows->product_name;
		  //   		$product_price=$rows->product_price;
		  //   		$product_img=$rows->product_img;
    //                 $product_stock=$rows->product_stock;
    // 		}
    //         $att_color = Request::get('att_color');
    //         $att_material = Request::get('att_material');
    //         $qty = Request::get('qty');
    //         //nếu k vào product detail mua hàng thì sẽ không có 3 mục qty , color và material để chọn
    //         //=> sẽ tạo default 3 giá trị trên nếu mua ở ngoài
    //         $att_color = isset($att_color) && $att_color != ""?$att_color:$att_product->att_color;
    //         $att_material = isset($att_material) && $att_material != ""?$att_material:$att_product->att_material;
    //         // dd($att_material);
    //         $qty = isset($qty) && $qty != ""?$qty:1;
    //         if($product_stock>0)
    //         {
    // 				Cart::add([
			 //    				'id' => $id,
			 //    				'name' => $product_name,
			 //    				'price' => $product_price,
			 //    				'qty' => $qty,
			 //    				'options' => ['img'=>$product_img,'att_color'=>$att_color,'att_material'=>$att_material,
    //                                           'stock'=>$product_stock,'rowId'=>$id]
	   //  			  		]);
	   //  			// Cart::destroy();
    //                 return redirect()->back();         
	   //  	}
    //         else
	   //      {
    //             echo "<script type='text/javascript'>
    //             alert('Chúng tôi rất tiếc, mặt hàng này đã bán hết, bạn vui lòng xem các sản phẩm khác ạ! T^T ');
    //             window.location = '".url('/')."'
    //             </script>";
	   //  	}
    	
    // }
    function add_to_cart_ajax()
    {
            $id = Request::get('id');
            $qty = Request::get('qty');
            $product=DB::select("select * from shop_products where product_pk_id='$id'");
            $att_product=DB::table("shop_products")
                                ->join('shop_product_attribute','shop_products.product_pk_id','=','shop_product_attribute.product_fk_id')
                                ->where("product_pk_id","=","$id")->first();
            foreach ($product as $rows) {
                    $product_name=$rows->product_name;
                    $product_price=$rows->product_price;
                    $product_img=$rows->product_img;
                    $product_stock=$rows->product_stock;
            }
            $att_color = Request::get('color');
            $att_material = Request::get('material');
            $qty = Request::get('qty');
            //nếu k vào product detail mua hàng thì sẽ không có 3 mục qty , color và material để chọn
            //=> sẽ tạo default 3 giá trị trên nếu mua ở ngoài
            $att_color = isset($att_color) && $att_color != ""?$att_color:$att_product->att_color;
            $att_material = isset($att_material) && $att_material != ""?$att_material:$att_product->att_material;
            // dd($att_material);
            $qty = isset($qty) && $qty != ""?$qty:1;
            if($product_stock>0)
            {
                    Cart::add([
                                'id' => $id,
                                'name' => $product_name,
                                'price' => $product_price,
                                'qty' => $qty,
                                'options' => ['img'=>$product_img,'att_color'=>$att_color,'att_material'=>$att_material,
                                              'stock'=>$product_stock,'rowId'=>$id]
                            ]);
                    // Cart::destroy();
                         
            }
            else
            {
                echo "<script type='text/javascript'>
                alert('Chúng tôi rất tiếc, mặt hàng này đã bán hết, bạn vui lòng xem các sản phẩm khác ạ! T^T ');
                window.location = '".url('/')."'
                </script>";
            }
        
    }
    // function add_to_cart_comming_product($id)
    // {
    // 	$product=DB::select("select * from shop_products where product_pk_id='$id'");
    //     $att_product=DB::table("shop_products")
    //                             ->join('shop_product_attribute','shop_products.product_pk_id','=','shop_product_attribute.product_fk_id')
    //                             ->where("product_pk_id","=","$id")->first();
    // 		foreach ($product as $rows) {
    // 				$product_name=$rows->product_name;
		  //   		$product_price=$rows->product_price;
		  //   		$product_img=$rows->product_img;
    //                 $product_stock=$rows->product_stock;
    // 		}
    //         $att_color = Request::get('att_color');
    //         $att_material = Request::get('att_material');
    //         $qty = Request::get('qty');

    //         //nếu k vào product detail mua hàng thì sẽ không có 3 mục qty , color và material để chọn
    //         //=> sẽ tạo default 3 giá trị trên nếu mua ở ngoài
    //         $att_color = isset($att_color) && $att_color != ""?$att_color:$att_product->att_color;
    //         $att_material = isset($att_material) && $att_material != ""?$att_material:$att_product->att_material;
    //         $qty = isset($qty) && $qty != ""?$qty:1;
    //         if($product_stock>0)
    //         {
   	//     			Cart::add([
			 //    				'id' => $id,
			 //    				'name' => $product_name,
			 //    				'price' => $product_price,
			 //    				'qty' => $qty,
			 //    				'options' => ['img'=>$product_img,'att_color'=>$att_color,'att_material'=>$att_material,'rowId'=>$id]
	   //  			  		]);
	   //  			// Cart::destroy();
	   //  		    return redirect()->back();
    // 	    }
    //         else
    //         {
    //             echo "<script type='text/javascript'>
    //             alert('Chúng tôi rất tiếc, mặt hàng này đã được đặt hết, bạn vui lòng xem các sản phẩm khác ạ! T^T ');
    //             window.location = '".url('/')."'
    //             </script>";
    //         }
    // }
    function update_cart()
    {
        $rowId=Request::get('rowId');
        $product_qty=Request::get('qty');
        Cart::update($rowId,$product_qty);
    }
    function delete_cart($rowId)
    {
    	Cart::remove($rowId);
    	return redirect()->back();
    }
    function delete_cart_ajax()
    {
        $rowId=Request::get('rowId');
        Cart::remove($rowId);
    }
    function ajax_remove_all_cart()
    {
        Cart::destroy();
    }
    function checkout()
    {
        // if(Cart::count() > 0)
        //     {
    	       return view('frontend.shop-cart.checkout');
        //     }
        // else
        //     {
        //         return redirect(url('cart'));
        //     }
    }
    function checkout_method()
    {
        // if(Cart::count() > 0)
        //     {
               $data['ship'] = DB::table('shop_ship')->get();
               $data['county'] = DB::table('shop_ship_county')->get();
               return view('frontend.shop-cart.checkout_method',$data);
        //     }
        // else
        //     {
        //         return redirect(url('cart'));
        //     }
    }
    // function post_checkout(Request_Checkout $request)
    // {
    //     $guest_email=Session::get('email');
    //     $guest_id_arr=DB::table('guests')->where('guest_email',$guest_email)->first();
       
    //         $guest_id=$guest_id_arr->guest_pk_id;
        
    //     $place=Request::get("place");
    //     $mobile_number=Request::get("mobile_number");
    //     $status=0;
    //     $ship_city=DB::select("select * from shop_ship where ship_city='$place'");
    //     foreach($ship_city as $rows)
    //         {
    //             $ship_price=$rows->ship_price;
    //         }
    //     if(isset($ship_price))
    //         {
    //             if($ship_price!="free")
    //             {
    //                 $product_totalprice=Cart::total();
    //                 //$product_totalprice=str_replace(',','',Cart::total());
    //                 //str replace de sua 864,000 thanh 864000
    //                 $product_totalprice+=$ship_price;
    //                 $product_totalprice=number_format($product_totalprice);
    //              }
    //             else
    //             {
    //                 $product_totalprice=Cart::total(0);
    //             }
    //         }
    //         else
    //         {
    //              $product_totalprice=Cart::total(0);
    //         }
    //     DB::insert("insert into shop_checkout (guest_fk_id, checkout_place,checkout_mobile_number,checkout_totalprice,checkout_status)
    //      values ('$guest_id','$place','$mobile_number','$product_totalprice','$status')");
    //     $arr_checkout=DB::select("select * from shop_checkout");
    //     foreach($arr_checkout as $rows_checkout)
    //     {
    //         $checkout_pk_id=$rows_checkout->checkout_pk_id;
    //     }
    //             // dd(Cart::content());
    //     foreach(Cart::content() as $rows)
    //         {
    //             //insert thông tin chi tiết hóa đơn vào db , đồng thời trừ đi số lượng tồn kho thông qua att_material
    //             $checkout_fk_id=$checkout_pk_id;
    //             $product_fk_id=$rows->id;
    //             $product_number=$rows->qty;
    //             $att_material=$rows->options->att_material;
    //             $att_color=$rows->options->att_color;
    //             // dd($att_material);
    //             $arr_product_qty=DB::table('shop_product_attribute')->where('product_fk_id','=',$product_fk_id)
    //                                 ->where('att_material','=',$att_material)
    //                                 ->select('att_qty')->first();
    //             // dd($arr_product_qty);
    //             $att_qty = $arr_product_qty->att_qty;
    //             $att_qty= $att_qty - $product_number;
    //             $product_totalprice=$rows->total;
    //             DB::insert("insert into shop_checkout_detail 
    //                 (checkout_fk_id,product_fk_id,product_number,att_material,att_color,product_totalprice) 
    //                 values
    //                 ('$checkout_fk_id','$product_fk_id','$product_number','$att_material','$att_color','$product_totalprice')");
    //             DB::table('shop_product_attribute')->where('product_fk_id','=',$product_fk_id)
    //                 ->where('att_material','=',$att_material)->update(['att_qty'=>$att_qty]);

    //         }
    //     Session::forget("voucher_arr");
    //     Session::forget("ship_price");
    //     Cart::destroy();
    //     echo "<script type='text/javascript'>
    //     alert('Cảm ơn bạn đã mua hàng ,chúng tôi đã gửi hóa đơn tới hòm thư , xin hãy kiểm tra E-mail của bạn');
    //     window.location = '".url('/')."'
    //     </script>";

    // }
    function post_checkout()
    {
        if(Session::has('info'))
        {
            $guest_email=Session::get('email');
            $info = Session::get('info');
            $city = $info['city'];
            $place = $info['place'];
            $mobile_number = $info['mobile_number'];

            $guest_id_arr=DB::table('guests')->where('guest_email',$guest_email)->first();
            $guest_id=$guest_id_arr->guest_pk_id;
            $status=0;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date('Y-m-d-H:i:s');
            $ship_city=DB::select("select * from shop_ship where ship_city = '$city'");
            foreach($ship_city as $rows)
                {
                    $ship_price=$rows->ship_price;
                }
            if(isset($ship_price))
                {
                    if($ship_price!="free")
                    {
                        $product_totalprice=Cart::total();
                        //$product_totalprice=str_replace(',','',Cart::total());
                        //str replace de sua 864,000 thanh 864000
                        $product_totalprice+=$ship_price;
                        $product_totalprice=$product_totalprice;
                     }
                    else
                    {
                        $product_totalprice=Cart::total(0);
                    }
                }
                else
                {
                     $product_totalprice=Cart::total(0);
                }
            DB::insert("insert into shop_checkout (guest_fk_id, checkout_place,checkout_mobile_number,checkout_totalprice,checkout_status,checkout_time)
             values ('$guest_id','$place','$mobile_number','$product_totalprice','$status','$time')");
            $arr_checkout=DB::select("select * from shop_checkout");
            foreach($arr_checkout as $rows_checkout)
            {
                $checkout_pk_id=$rows_checkout->checkout_pk_id;
            }
                    // dd(Cart::content());
            foreach(Cart::content() as $rows)
                {
                    //insert thông tin chi tiết hóa đơn vào db , đồng thời trừ đi số lượng tồn kho thông qua att_material
                    $checkout_fk_id=$checkout_pk_id;
                    $product_fk_id=$rows->id;
                    $product_number=$rows->qty;
                    $att_material=$rows->options->att_material;
                    $att_color=$rows->options->att_color;
                    // dd($att_material);
                    $arr_product_qty=DB::table('shop_product_attribute')->where('product_fk_id','=',$product_fk_id)
                                        ->where('att_material','=',$att_material)
                                        ->select('att_qty')->first();
                    // dd($arr_product_qty);
                    $att_qty = $arr_product_qty->att_qty;
                    $att_qty= $att_qty - $product_number;
                    $product_totalprice=$rows->total;
                    DB::insert("insert into shop_checkout_detail 
                        (checkout_fk_id,product_fk_id,product_number,att_material,att_color,product_totalprice) 
                        values
                        ('$checkout_fk_id','$product_fk_id','$product_number','$att_material','$att_color','$product_totalprice')");
                    DB::table('shop_product_attribute')->where('product_fk_id','=',$product_fk_id)
                        ->where('att_material','=',$att_material)->update(['att_qty'=>$att_qty]);

                }
            Session::forget("voucher_arr");
            Session::forget("ship_price");
            Cart::destroy();
            echo "<script type='text/javascript'>
            alert('Cảm ơn bạn đã mua hàng ,chúng tôi đã gửi hóa đơn tới hòm thư , xin hãy kiểm tra E-mail của bạn');
            window.location = '".url('/')."'
            </script>";
        }
        else
        {
            echo "<script type='text/javascript'>
            alert('Bạn chưa nhập thông tin , chúng tôi không thể xác thực đơn hàng này !');
            window.location = '".url('checkout_method')."'
            </script>";
        }

    }
    function post_info()
    {
        $place=Request::get("place");
        $mobile_number=Request::get("mobile_number");
        $city = Request::get('city');
        $county = Request::get('county');
        $arr = 
        [ 
            'place'=>$place,
            'mobile_number'=>$mobile_number,
            'city'=>$city,
            'county'=>$county
        ];
        Session::put('info',$arr);
        // return redirect()->back();
    }
    public function county()
    {
        $city = Request::get('city');
        if($city != '0')
        {
            $ship_id = DB::table('shop_ship')->where('ship_city','=',$city)->select('ship_id')->first();
            $county = Shop_Ship_County::where('ship_id','=',$ship_id->ship_id)->select('county_name')->get()->toArray();
        }
        else
        {
            $county = [];
        }
        return json_encode($county);
    }
    
}
