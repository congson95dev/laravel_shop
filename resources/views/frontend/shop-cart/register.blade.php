@extends('frontend.shop-cart.layout')
@section('controller')
<!-- 
Body Section 
-->
	<div class="row">

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang Chủ</a> <span class="divider">/</span></li>
		<li class="active">Đăng Ký</li>
    </ul>
	<h3> Đăng Ký</h3>	
	<hr class="soft"/>
	<div class="well">
	<form class="form-horizontal" method="post" action="{{ url('guest_register_account') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h3>Thông tin về bạn</h3>
		<div class="control-group">
		<label class="control-label">Tiêu đề <sup>*</sup></label>
		<div class="controls">
		<select class="span1" name="title" >
			{{-- <option value="">-</option> --}}
			<option value="Mr.">Mr.</option>
			<option value="Mrs">Mrs</option>
			<option value="Miss">Miss</option>
		</select>
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname">Họ <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="firstname" placeholder="First Name" >
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Tên <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="lastname" placeholder="Last Name" >
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="Email" name="g_email" placeholder="Email" >
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="g_password" placeholder="Password" >
		</div>
	  </div>
		<div class="control-group">
		<label class="control-label">Ngày sinh <sup>*</sup></label>
		<div class="controls">
		   <select class="span1" name="days">
				{{-- <option>-</option> --}}
					<?php 
						for($d=1;$d<=31;$d++)
							{
						?>
								<option value="{{ $d }}"> {{ $d }} &nbsp;&nbsp;</option>;
						<?php } ?> 
					
		 	</select>
			<select class="span1" name="months">
				{{-- <option>-</option> --}}
					<?php 
						for($m=1;$m<=12;$m++)
							{
					?>
								<option value="{{ $m }}"> {{ $m }} &nbsp;&nbsp;</option>;
					<?php } ?> 
			</select>
			<select class="span1" name="years">
				{{-- <option>-</option> --}}
					<?php 
						for($y=1800;$y<=2017;$y++)
							{
					?>
								<option value="{{ $y }}""> {{ $y }} &nbsp;&nbsp;</option>;
					<?php } ?> 
			</select>
		</div>
	  </div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Đăng Ký" class="exclusive shopBtn">
		</div>
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
	</form>
</div>

{{-- <div class="well">
	<form class="form-horizontal" >
		<h3>Your Billing Details</h3>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		 <div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <textarea></textarea>
			</div>
		</div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="shopBtn exclusive">
		</div>
	</div>
	</form>
</div>


<div class="well">
	<form class="form-horizontal" >
		<h3>Your Account Details</h3>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div> --}}


</div>
</div>

@endsection