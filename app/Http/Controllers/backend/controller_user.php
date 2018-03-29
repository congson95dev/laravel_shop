<?php

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use DB;
use Request;
use Session;
use Illuminate\Auth\Authenticatable;
use App\Http\Requests\Request_Admin_Register;
use App\Http\Requests\Request_Update_Admin;
use App\Http\Requests\Request_Add_Admin;
//use Illuminate\Support\Facades\Input;
use Image;
use File;

class controller_user extends Controller
{
    public function main()
    {
       $data["arr"]=DB::table('users')->orderBy('pk_user_id','desc')->paginate(5);
       return view('backend.view_main',$data);
    }
 	public function list_user()
	{
	   $data["arr"]=DB::table('users')->orderBy('pk_user_id','desc')->paginate(5);
       return view('backend.view_list_user',$data);
    }
    public function admin_profile($id)
    {
       $data["arr"]=DB::select("select * from users where pk_user_id='$id' ");
       return view('backend.view_admin_profile',$data);
    }
    public function register_account()
    {
    	return view('backend.view_register');
    }
   
    public function post_register_account(Request_Admin_Register $req)
    {
    	$fullname = Request::get("fullname");
    	$username = Request::get("username");
    	$password = Request::get("password");
        $password = md5($password);
    	$email = Request::get("email");
    	$confirm_password = Request::get("repassword");
        $confirm_password = md5($confirm_password);

        DB::insert("insert into users (username,password,fullname,email) values ('$username','$password','$fullname','$email')");
        return redirect(url('admin_login'));
	
    	
    }
    public function forgot_password(){
    	return view('backend.forgot-password');
    }
    public function post_forgot_account(){
    	$username = Request::get("username");
    	$email = Request::get("email");
        

    	$cr_username = DB::select("select username from users where username='$username' and email='$email'");
        
    	if(!empty($cr_username))
    	{
	    	$password=bcrypt("1");
	    	DB::update("update users set password = '$password' where email='$email'  ");
	    	return redirect(url('login'));
	    	
	    }
	    else 
	    {
	    	return view('backend.forgot-password',['err'=>'uerr']);
	    	
	    }
    	
    }
    public function logout()
    {
        // dd(Session::get('admin_id'));
        Session::forget("admin_id");
        return redirect(url('admin_login'));
    }
    public function admin_account()
    {
        $user_ss = Session::get('username'); 
        $data["arr_admin_acc"] = DB::select("select * from users where username='$user_ss'");

        return view('backend.admin_accout',$data);
    }
    public function update_admin(Request_Update_Admin $request,$id)
    {
        $fullname=Request::get("fullname");
        $sex=Request::get("sex");
        $address=Request::get("address");
        $mobile_number=Request::get("mobile_number");
        $image = Request::get('image');
        $permission = Request::get('permission');
        $arr_old_image = DB::table('users')->where('pk_user_id',$id)->select('image')->first();
        $imageName = $arr_old_image->image;
        //nếu có chỉnh sửa ảnh thì xóa ảnh cũ và update ảnh mới vào db , còn không thì giữ nguyên ảnh ban đầu
        if($request->hasFile('image'))
        {
            if($imageName != 'default_nam.jpg' && $imageName != 'default_nu.jpg')
            {
                File::delete(public_path("/backend/dist/img/admin_img/".$imageName));
            }
            $image = $request->file('image');
            $imageName = time().'.'.$request->image->getClientOriginalName();
            Image::make($image)->resize(128, 128)->save(public_path('/backend/dist/img/admin_img/'.$imageName));

        }
        $permission=($permission=='Là Quản Trị Viên')?1:0;

        //dd($fullname,$sex,$address,$mobile_number);
        // DB::update("update users set fullname='$fullname',sex='$sex',address='$address',mobile_number='$mobile_number'
        //             where pk_user_id='$id' ");
        DB::table('users')->where('pk_user_id',$id)
        ->update(['fullname'=>$fullname,'sex'=>$sex,'address'=>$address,'mobile_number'=>$mobile_number,'image'=>$imageName,
        'permission'=>$permission]);
        echo "<script type='text/javascript'>
        alert('Sửa thông tin thành công, cảm ơn bạn đã lựa chọn trang web của chúng tôi :D');
        window.location = '".url('list_user')."'
        </script>";
    }
    public function delete_admin($id)
    {
        //nếu admin này đang trong phiên đăng nhập , thì không cho xóa , ngược lại , thì xóa ; xóa cả ảnh
        if(Session::has('admin_id') && Session::get('admin_id') == $id)
            {
                  echo "<script type='text/javascript'>
                  alert('Không thể xóa, admin này đang trong phiên sử dụng, cảm ơn bạn đã lựa chọn trang web của chúng tôi :D');
                  window.location = '".url('admin')."'
                  </script>";
            }
        else
            {
                    $arr_old_image = DB::table('users')->where('pk_user_id',$id)->select('image')->first();
                    $imageName = $arr_old_image->image;
                    if($imageName != 'default_nam.jpg' && $imageName != 'default_nu.jpg')
                    {
                        File::delete(public_path("/backend/dist/img/admin_img/".$imageName));
                    }
                    DB::table('users')->where('pk_user_id','=',$id)->delete();
                    echo "<script type='text/javascript'>
                    alert('Xóa admin thành công, cảm ơn bạn đã lựa chọn trang web của chúng tôi :D');
                    window.location = '".url('admin')."'
                    </script>";
            }
    }
    public function add_admin()
    {
        return view('backend.view_add_admin');
    }
    public function post_add_admin(Request_Add_Admin $request)
    {
        $username = Request::get("username");
        $password = Request::get("password");
        $password = md5($password);
        $email = Request::get("email");
        $fullname=Request::get("fullname");
        $sex=Request::get("sex");
        $address=Request::get("address");
        $mobile_number=Request::get("mobile_number");
        $permission = Request::get('permission');
        //check sdt , nếu không có +84 trong database thì add +84 

        $image = Request::get('image');
        // if(Input::hasFile('image'))
        //     {
        //         $image = Input::file('image');
        //         $image->move('backend/dist/img/admin_img', $image->getClientOriginalName());
        //     }
           
        // nếu có upload ảnh thì insert vào db , còn không thì mặc định ảnh là default_nam và default_nu
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time().'.'.$request->image->getClientOriginalName();
            Image::make($image)->resize(128, 128)->save(public_path('/backend/dist/img/admin_img/'.$imageName));
        }   
        else
        {
            if($sex == 'Nam')
            {
                $imageName = 'default_nam.jpg';
            }
            else 
            {
                $imageName = 'default_nu.jpg';
            }
        }
        $permission=($permission=='Là Quản Trị Viên')?1:0;
        DB::insert("insert into users (username,password,email,fullname,sex,address,mobile_number,image,permission) 
            values ('$username','$password','$email','$fullname','$sex','$address','$mobile_number','$imageName','$permission')");
        return redirect(url('list_user'));
    }
}
