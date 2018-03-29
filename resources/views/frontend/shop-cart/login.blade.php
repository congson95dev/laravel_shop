@extends('frontend.shop-cart.layout')
@section('controller')
	<div class="row">

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Đăng nhập</li>
    </ul>
	<h3> Đăng nhập</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span4">
			<div class="well">
			<h5>TẠO TÀI KHOẢN MỚI</h5><br/>
			Điền địa chỉ E-mail của bạn để tạo tài khoản mới<br/><br/><br/>
			<form method="post" action="{{ url('guest_register_account_small') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Địa chỉ E-mail</label>
				<div class="controls">
				  <input class="span3" name="g_email"  type="email" placeholder="Email">
				</div>
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				  <input class="span3" name="g_password"  type="password" placeholder="Password">
				</div>
			  </div>
			  <div class="controls">
			  <input type="submit" class="btn block" value="Tạo tài khoản">
			  </div>
			</form>
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li style="list-style: none;">{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
		</div>
		@if(Session::has('thongbao'))
		<div class="alert alert-success">{{ Session::get('thongbao') }}</div>
		@endif
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<h5>BẠN ĐÃ CÓ SẴN TÀI KHOẢN ?</h5>
			<form method="post" action="{{ url('guest_login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
				  <input class="span3"  type="email" name="gl_email" placeholder="Email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Mật khẩu</label>
				<div class="controls">
				  <input type="password" class="span3" name="gl_password" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				  <input type="submit" class="defaultBtn" value="Đăng nhập"> <a href="{{ url('guest_forgot_password') }}">Quên mật khẩu ?</a>
				</div>
			
			  </div>
			</form>
			 <?php echo isset($err)?"<div class='alert alert-danger' style='text-align:center'>Sai username hoặc password</div>":""; ?>
		</div>
		</div>
	</div>	
	
</div>
</div>
@endsection