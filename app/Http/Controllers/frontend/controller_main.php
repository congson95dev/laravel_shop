<?php

namespace App\Http\Controllers\frontend;

use Request;
use App\Http\Controllers\Controller;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Http\Requests\Request_Contact;

class controller_main extends Controller
{
	public function adv_and_products()
		{
			$data["arr_adv"]=DB::select("select * from shop_adv_top");
			$data["arr_products"]=DB::select("select * from shop_products where product_top_huge=1 and product_comming='0' 
											  order by product_pk_id desc limit 3");
			$data["arr_featured_products"]=DB::select("select * from shop_products where product_featured=1 and product_comming='0' order by product_pk_id desc limit 3");
			$data["arr_new_products"]=DB::select("select * from shop_products where product_comming='0' order by product_pk_id desc limit 8");

    		return view("frontend.shop-cart.main",$data);
		}
	public function contact_us()
	{
		return view("frontend.shop-cart.contact");
	}
	public function post_contact_us(Request_Contact $req)
	{
				 require '../vendor/autoload.php';

				 $c_email = Request::get("email");
				 $c_name = Request::get('name');
				 $c_subject = Request::get('subject');
				 $c_content = Request::get('content');
   
					$mail = new PHPMailer(true);

			
					$mail->CharSet = 'UTF-8';
	                // $mail->IsSMTP();  
	                // đoạn này để fix ko thể kết nối tới STMP
	                $mail->SMTPOptions = array(
					    'ssl' => array(
					    'verify_peer' => false,
					    'verify_peer_name' => false,
					    'allow_self_signed' => true
					    )
					);
	              	$mail->SMTPDebug = 2;
					$mail->isSMTP(); 
	                $mail->Host = "smtp.gmail.com"; 
	                $mail->SMTPAuth = true;
	                //sử dụng email của chính mình để gửi cho chính mình , trong đó thì c_email nhận đc ở form sẽ cho vào content và gửi đi
	                $mail->Username = "saxsax1995@gmail.com";  
	                $mail->Password = "3191215225161";  
	                $mail->SMTPSecure = 'tls';
	                $mail->Port = 587; 

	               	$mail->addAddress("saxsax199502a@gmail.com","Nguyễn Công Sơn");
	                $mail->AddReplyTo($c_email,'Khách Hàng'); 
	                $mail->setFrom($c_email,$c_name);
	                // $mail->FromName = 'Bộ phận chăm sóc khách hàng của fudushop'; 
	                $mail->isHTML(true);      
	                $mail->WordWrap = 50;  
	                $mail->Subject = $c_subject;
	                $mail->Body = "Thư gửi từ email <h3>".$c_email."</h3> với nội dung: <br><h2>".$c_content."</h2>";
	                $mail->send();
	               return redirect()->back()->with('thongbao','Gửi e-mail thành công!');
	}
	public function about_us()
	{
		return view("frontend.shop-cart.about_us");
	}
}

    
