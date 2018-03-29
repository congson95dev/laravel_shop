@extends('frontend.shop-cart.layout')
@section('controller')

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">ĐẶT LẠI MẬT KHẨU</li>
    </ul>
	<div class="well well-small">
	<h3> ĐẶT LẠI MẬT KHẨU</h3>	
	<hr class="soft"/>
	
	Xin hãy điền địa chỉ E-mail và mật khẩu mới của bạn : <br/><br/><br/>
	 <?php if(isset($err) && $err=='pwerr') 
	 	{ 
	 		echo "<div class='alert alert-danger' style='text-align:center'>Xác nhận mật khẩu không khớp ! </div>"; 
		}
	?>
	 <?php if(isset($err) && $err=='emerr') 
	 	{ 
	 		echo "<div class='alert alert-danger' style='text-align:center'>Email này chưa từng được đăng ký ! </div>"; 
		}
	?>
	

	<form class="form-inline" method="post" action="{{ url('guest_reset_password') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<label class="control-label" for="inputEmail" style="margin-right: 79px;">Địa chỉ E-mail</label>
		<input type="email" class="span4" name="email" placeholder="Email"><br>	<br>
		<label class="control-label" for="inputPassword" style="margin-right: 81px;">Mật khẩu mới</label>
		<input type="password" class="span4" name="password" placeholder="Nhập Password"><br><br>	
		<label class="control-label" for="inputPassword">Xác nhận lại mật khẩu mới</label>
		<input type="password" class="span4" name="n_password" placeholder="Nhập lại Password"><br><br><br>
		<input type="submit" class="shopBtn block" value="Xác nhận" style="margin-left: 200px;">


	</form>

</div>
</div>


@endsection