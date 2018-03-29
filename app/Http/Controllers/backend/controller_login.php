<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use Request;
use Illuminate\Auth\Authenticatable;
use App\Http\Requests\Request_Admin_Login;
use DB;
use Session;

class controller_login extends Controller
{
	use Authenticatable;

    public function get_login()
    {
    	return view('backend.view_login');
    }
    public function post_login(Request_Admin_Login $req)
    {
    $username = Request::get("username");
	$password = Request::get("password");
	$password = md5($password);
	//dd($password);
	//kiem tra user login bang ham attempt trong doi tuong Auth, neu ket qua tra ve 1 co nghia la dung email va password, nguoc lai co nghia la khong dung
	$correct=DB::select("select * from users where username='$username' and password='$password'");
	//dd($correct);
	foreach($correct  as $rows_correct)
	{
		$pk_user_id = $rows_correct->pk_user_id;
	}

	if($correct)
		{
			//dang nhap thanh cong, di chuyen den trang user
			Session::put("admin_id",$pk_user_id);
			return redirect(url('admin'));
			
		}
	else
		{
			//dang nhap khong thanh cong, di chuyen den trang login va hien thi thong bao loi
			return redirect(url("admin_login"))->with('thongbao','Tài khoản hoặc mật khẩu không chính xác');
		}
    }
}
