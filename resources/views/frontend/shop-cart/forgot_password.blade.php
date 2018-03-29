@extends('frontend.shop-cart.layout')
@section('controller')

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">QUÊN MẬT KHẨU</li>
    </ul>
	<div class="well well-small">
	<h3> QUÊN MẬT KHẨU</h3>	
	<hr class="soft"/>
	
	Xin hãy điền E-mail của bạn vào đây và chúng tôi sẽ gửi mail đặt lại mật khẩu mới vào hòm thư của bạn.<br/><br/><br/>
	
	 <?php echo isset($err)?"<div class='alert alert-danger' style='text-align:center'>Email này chưa từng được đăng ký ! </div>":""; ?>
	 <?php echo isset($act)?"<div class='alert alert-primary' style='text-align:center'> Gửi E-mail thành công , mời bạn vào E-mail xác nhận ! </div>":""; ?>
	<form class="form-inline" method="post" action="{{ url('guest_forgot_password') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<label class="control-label" for="inputEmail">Địa chỉ E-mail</label>
		<input type="email" class="span4" name="email" placeholder="Email">	
		<input type="submit" class="shopBtn block" value="Xác nhận" 
		onclick=
		"
			<?php 
				use PHPMailer\PHPMailer\PHPMailer;
				use PHPMailer\PHPMailer\Exception;

				require '../vendor/autoload.php';

				 $email = Request::get("email");
   
       			 $db_email=DB::table("guests")->where('guest_email','=',$email)->first();
       			 // bat loi~ trung Email
          		  if(isset($db_email))
           		 {
					$mail = new PHPMailer(true);

			
					$mail->CharSet = 'UTF-8';
	                // $mail->IsSMTP();  
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
	                $mail->Username = "saxsax199502a@gmail.com";  
	                $mail->Password = "3191614522518";  
	                $mail->SMTPSecure = 'tls';
	                $mail->Port = 587; 

	               	$mail->setFrom('saxsax199502a@gmail.com', 'FuduShop');
	                // $mail->FromName = 'Bộ phận chăm sóc khách hàng của fudushop'; 
	                $mail->addAddress("$email","Khách Hàng");
	                $mail->AddReplyTo('saxsax199502a@gmail.com','Nguyễn Công Sơn'); 

	                $mail->isHTML(true);      
	                $mail->WordWrap = 50;  
	                $mail->Subject = 'E-mail quên mật khẩu từ fudushop';
	                $mail->Body = 'Xin chào, fudushop nhận thấy bạn đã gửi xác nhận quên mật khẩu !<br>
	                				Xin click vào link dưới để reset mật khẩu của bạn!<br>
	                				<a href='. url('guest_reset_password') .'>Xác nhận</a> ' ;
	                $mail->send();
	                
	               
				}
				?>
        ">


	</form>

</div>
</div>


@endsection