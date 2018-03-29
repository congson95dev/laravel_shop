<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;
use Illuminate\Auth\Authenticatable;
use App\Http\Requests\Request_Update_Guest;
//use Illuminate\Support\Facades\Input;
use Image;
use File;

class controller_guest extends Controller
{
   
 	public function list_guest()
	{
	   $data["arr"]=DB::table('guests')->orderBy('guest_pk_id','desc')->paginate(5);
       return view('backend.view_list_guest',$data);
    }
    public function update_guest($id)
    {
       $data["arr"]=DB::select("select * from guests where guest_pk_id='$id' ");
       return view('backend.view_update_guest',$data);
    }
   
    public function post_update_guest(Request_Update_Guest $request,$id)
    {
        $guest_title=Request::get('guest_title');
        $guest_firstname=Request::get("guest_firstname");
        $guest_lastname=Request::get("guest_lastname");
        $guest_email=Request::get('guest_email');
        $days=Request::get('days');
        $months=Request::get('months');
        $years=Request::get('years');

        $guest_birth = date_format(date_create($days.'-'.$months.'-'.$years),'Y-m-d');

        DB::table('guests')->where('guest_pk_id',$id)
           ->update(['guest_title'=>$guest_title,'guest_firstname'=>$guest_firstname,'guest_lastname'=>$guest_lastname,'guest_email'=>$guest_email,'guest_birth'=>$guest_birth]);

        echo "<script type='text/javascript'>
        alert('Sửa thông tin khách hàng thành công, cảm ơn bạn đã lựa chọn trang web của chúng tôi :D');
        window.location = '".url('list_guest')."'
        </script>";
    }
    public function delete_guest($id)
    { 
        //1 khi xóa guest thì xóa luôn checkout và checkout detail của guest đó
        $checkout_id_arr = DB::table('shop_checkout')->where('guest_fk_id','=',$id)->select('checkout_pk_id as checkout_id')->first();
        $checkout_id = $checkout_id_arr->checkout_id;
        
        DB::table('guests')->where('guest_pk_id','=',$id)->delete();
        DB::table('shop_checkout')->where('guest_fk_id','=',$id)->delete();
        DB::table('shop_checkout_detail')->where('checkout_fk_id','=',$checkout_id)->delete();
        echo "<script type='text/javascript'>
        alert('Xóa khách hàng thành công, cảm ơn bạn đã lựa chọn trang web của chúng tôi :D');
        window.location = '".url('list_guest')."'
        </script>";
            
    }
   
}
