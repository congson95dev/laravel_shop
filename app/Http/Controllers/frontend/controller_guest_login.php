<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Request;
use DB;
use App\Http\Requests\Request_Guest_Login;
use App\Guests;
use App\User;
use Illuminate\Auth\Authenticatable;
use Session;
use Cart;


class controller_guest_login extends Controller
{

    public function guest_login()
    
    {
        return view('frontend.shop-cart.login');
    }

   

    public function post_guest_login(Request_Guest_Login $request){
        $email = Request::get("gl_email");
        $password = Request::get("gl_password");
        $password = md5($password);
        $use = DB::select("select * from guests where guest_email = '$email' and guest_password = '$password'");
        //if(Auth::guard('guests')->attempt(array('guest_email'=>$email,'password'=>$password)))
        if ($use)
            {
                 Session::put('email', $email);
                //trang dang nhap o cart.blade.php va trang dang nhap o header.blade.php la khac nhau => phai co if
             	 if(Cart::count()>0)
                    {
                        return redirect(url('cart'));
                    }
                    else
                    {
                        return redirect(url('/'));
                    }
            }
        else
            {

                  //dang nhap khong thanh cong, di chuyen den trang login va hien thi thong bao loi
                  return view("frontend.shop-cart.login",['err'=>'invalid']);
                  
           }
    }
    public function logout()
    {
    	Session::forget('email');
        return redirect(url('/'));
    }
}
