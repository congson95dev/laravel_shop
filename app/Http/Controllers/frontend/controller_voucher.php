<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use Request;
use Cart;
use Session;
use DB;
use App\Http\Requests\Request_voucher;
use App\Http\Requests\Request_Ship;

class controller_voucher extends Controller
{
    public function voucher_use()
    {
    	$voucher_code = Request::get("voucher");
    	$check_voucher = DB::table('shop_voucher')->where('voucher_id','=',$voucher_code)->where('voucher_status','=','1')->select('voucher_effect')->first();
        
        if($check_voucher)
    	{
            if(!Session::has('voucher_arr'))
            {
       		   	$voucher_effect = $check_voucher->voucher_effect;
                // $voucher_effect = $check_voucher['voucher_effect'];
       		   	$voucher_arr = ['voucher_effect' => $voucher_effect];
    			Session::push("voucher_arr",$voucher_arr);
                DB::table('shop_voucher')->where('voucher_id','=',$voucher_code)->update(['voucher_status'=>0]);
                // Session::forget('voucher_arr');
                return response()->json(["error" => false,"voucher_effect" => $voucher_effect,"message" => "Sử dụng Voucher thành công! bạn được giảm giá ".$voucher_effect." % !"]);
        			// return redirect()->back()->with('thongbao','Sử dụng Voucher thành công! bạn được giảm giá '.$voucher_effect.' % !');
            }
            else
            {
                // Session::forget('voucher_arr');
                return response()->json(["error" => true,"message" => "Bạn đã sử dụng voucher rồi , mỗi 1 đơn hàng chỉ được phép sử dụng 1 voucher :X "]);
            }      
    	}	
        else
        {
            return response()->json(["error" => true,"message" => "Voucher này đã hết hạn hoặc đã được sử dụng trước đó :<"]);
        }
    	// else
    	// {
    	// 	return redirect()->back()->with('loi','Sử dụng Voucher không thành công!
    	//     Voucher này không tồn tại hoặc đã được sử dụng trước đó !');
    	// }
    }
    // public function ship_calculate(Request_Ship $req)
    // {
    //         $country = Request::get("country");
    //         $ship=DB::table("shop_ship")->where("ship_city","=","$country")->first();
    //         //cai isset nay thay cho xet $country voi' ship_city trong SQL , vi so sanh nhu vay bi sai @@
    //         if(isset($ship->ship_price))
    //         {
    //             $ship_price =$ship->ship_price; 
    //             if($ship_price=='free')
    //             {
    //                 echo "<script type='text/javascript'>
    //                 alert('Dịch vụ trong nội thành được miễn phí ^_^ ');
    //                 window.location = '".url('cart')."'
    //                 </script>";
    //             }
    //             else
    //             {
    //                 $ship_price = number_format($ship->ship_price);
    //                 echo "<script type='text/javascript'>
    //                 alert('Số tiền bạn phải trả cho dịch vụ là ".$ship_price." VNĐ');
    //                 window.location = '".url('cart')."'
    //                 </script>";
    //             }
    //         }
    //         else 
    //         {
    //             echo "<script type='text/javascript'>
    //             alert('Dịch vụ của shop chưa được phủ sóng tới nơi này , mong bạn thông cảm ^_^ ');
    //             window.location = '".url('cart')."'
    //             </script>";
    //         }

    
        
    // }
}
