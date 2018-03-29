<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Request;
use DB;
use App\Http\Requests\Request_Guest_Register;
use App\Http\Requests\Request_Guest_Register_Small;
// use App\Guests;
// use App\User;
use App\Model\Guests;
use App\Model\Checkout;
use App\Model\Checkout_Detail;
use Illuminate\Auth\Authenticatable;
use Session;
use DateTime;
use Carbon\Carbon;
use App\Guests as GuestsModel;

class controller_guest extends Controller
{

    public function __construct(Guests $guest,Checkout $checkout,Checkout_Detail $checkout_detail)
    {
        $this->guest = $guest;
        $this->checkout = $checkout;
        $this->checkout_detail = $checkout_detail;
    }

    public function guest_register_account()
    {
    	return view('frontend.shop-cart.register');
        
    }
   
    public function post_guest_register_account(Request_Guest_Register $request)
    {
                    $data['guest_title'] = Request::get("title");
                	$data['guest_firstname'] = Request::get("firstname");
                    $data['guest_lastname'] = Request::get("lastname");
                	$data['guest_email'] = Request::get("g_email");
                	$password = Request::get("g_password");
                    $data['guest_password']=md5($password);
                	$days = Request::get("days");
                    $months = Request::get("months");
                    $years = Request::get("years");
                    $data['guest_birth'] = date_format(date_create($years."/".$months."/".$days),'y-m-d');
                    
                    $result =  GuestsModel::insertGetId($data);
                    if(isset($result) && !empty($result)){
                        return redirect(url('/'));
                    }
	
    }
     // trang dang ky khong day du (trong cart -> dang nhap)
    public function post_guest_register_account_small(Request_Guest_Register_Small $request)
    {
                    $email = Request::get("g_email");
                    $password = Request::get("g_password");
                    $password=md5($password);
                    DB::insert("insert into guests (guest_email,guest_password) values('$email','$password')");
                    return redirect(url('guest_login'))->with('thongbao','Tạo tài khoản thành công!');
    }

  
    
    public function forgot_password()
    {
        return view('frontend.shop-cart.forgot_password');
    }
    public function post_forgot_password()
    {
        $email = Request::get("email");
   
        $db_email=DB::table("guests")->where('guest_email','=',$email)->first();
        // bat loi~ trung Email
            if(isset($db_email))
            {
                
                    return view('frontend.shop-cart.forgot_password',['act'=>'ok']);
                
            }
            else 
            {
                 return view('frontend.shop-cart.forgot_password',['err'=>'emerr']);
            }
    }
    public function reset_password()
    {
        return view('frontend.shop-cart.reset_password');
    }
      public function post_reset_password()
    {
        $email = Request::get("email");
        $password = Request::get("password");
        $n_password = Request::get("n_password");
     
   
        $db_email=DB::table("guests")->where('guest_email','=',$email)->first();
        // bat loi~ trung Email
            if(isset($db_email))
            {
                   if($password == $n_password)
                    {
                          $password = bcrypt($password);
                          DB::update("update guests set guest_password='$password' where guest_email='$email'");
                          return redirect(url('/'));
                    }
                    else
                    {
                        return view('frontend.shop-cart.reset_password',['err'=>'pwerr']);

                    }
            }
            else 
            {
                 return view('frontend.shop-cart.reset_password',['err'=>'emerr']);
            }

    }
     public function guest_accout()
    {
        $email_ss = Session::get('email'); 
        $data["arr_guest_acc"] = DB::select("select * from guests where guest_email='$email_ss'");

        return view('frontend.shop-cart.guest_accout',$data);
    }
    public function guest_update_accout()
    {
            $email=Session::get('email');
            
            $title = Request::get("title");
            $firstname = Request::get("firstname");
            $lastname = Request::get("lastname");
            $days = Request::get("days");
            $months = Request::get("months");
            $years = Request::get("years");

            $days = trim($days);
            $months = trim($months);
            $years = trim($years);
     
            // $birth = date_format(date_create($years."/".$months."/".$days),'y-m-d');
            date_default_timezone_set('Asia/Ho_Chi_Minh');   
            $birth = Carbon::create($years, $months, $days);
            //$birth = $years."/".$months."/".$days;
           // $birth = date_format(DateTime::createFromFormat('Y-m-d',$birth),'y-m-d');


            DB::update("update guests set guest_title='$title',guest_firstname='$firstname',guest_lastname='$lastname',guest_birth='$birth' where guest_email='$email' ");
            return redirect(url('guest_accout'))->with('thongbao','Chỉnh sửa tài khoản thành công!');
    }
    public function guest_checkout()
    {
        $email = Session::get('email');
        $guest = $this->guest->getByEmail($email);
        $guest_id = $guest->guest_id;
        $checkout = $this->checkout->getByGuestID($guest_id);
        return view('frontend.shop-cart.guest_checkout',compact('checkout'));
    }
    public function guest_checkout_detail($id)
    {
        $checkout_detail = $this->checkout_detail->getbyIdjoinProduct($id);
        return view('frontend.shop-cart.guest_checkout_detail',compact('checkout_detail'));
    }
}
