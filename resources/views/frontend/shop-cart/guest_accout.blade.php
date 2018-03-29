@extends('frontend.shop-cart.layout')
@section('controller')
<!-- 
Body Section 
-->
	<div class="row">

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang Chủ</a> <span class="divider">/</span></li>
		<li class="active">Tài khoản của tôi</li>
    </ul>
	<h3> Tài khoản của tôi</h3>	
	<hr class="soft"/>
	<div class="well">
	@foreach($arr_guest_acc as $rows)

	<form class="form-horizontal" method="post" action="{{ url('guest_update_account') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<h3>Thông tin về bạn</h3>
		<div class="control-group">
		<label class="control-label">Tiêu đề</label>
		<div class="controls">
		@if(isset($rows->guest_title))
			 {{-- <input type="text" name="firstname" value="{{ $rows->guest_title }}" disabled="disabled"> --}}
			 	<select class="span1" name="title" >
				{{-- <option value="">-</option> --}}
				<option value="Mr." {{ $rows->guest_title=="Mr." ? "selected='selected'" : "" }}>Mr.</option>
				<option value="Mrs" {{ $rows->guest_title=="Mrs" ? "selected='selected'" : "" }}>Mrs</option>
				<option value="Miss" {{ $rows->guest_title=="Miss" ? "selected='selected'" : "" }}>Miss</option>
			</select>
		@else
			<select class="span1" name="title" >
				{{-- <option value="">-</option> --}}
				<option value="Mr.">Mr.</option>
				<option value="Mrs">Mrs</option>
				<option value="Miss">Miss</option>
			</select>
		@endif
		</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname">Họ </label>
			<div class="controls">
			@if(isset($rows->guest_firstname))
				 <input type="text" name="firstname" value="{{ $rows->guest_firstname }}" >
			@else
			 	 <input type="text" name="firstname" placeholder="firstname ">
			@endif
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLname">Tên </label>
				<div class="controls">
			@if(isset($rows->guest_lastname))
				 <input type="text" name="lastname" value="{{ $rows->guest_lastname }}" >
			@else
			 	 <input type="text" name="lastname" placeholder="lastname ">
			@endif
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email </label>
		<div class="controls">
		  	@if(isset($rows->guest_email))
				 <input type="text" name="email" value="{{ $rows->guest_email }}" disabled="disabled">
			@else
			 	 <input type="text" name="email" placeholder="email ">
			@endif
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password </label>
		<div class="controls">
		    @if(isset($rows->guest_password))
				 <input type="password" name="password" value="{{ $rows->guest_password }}" disabled="disabled">
			@else
			 	 <input type="password" name="password" placeholder="password ">
			@endif
		</div>
	  </div>
	  <?php 
	  	//cach khac de tach' chuoi~ sql , de hien thi day , month , year
	  		//if(isset($rows->guest_birth))
	  		//{
				//$d_db=$rows->guest_birth;
		        // $arr = explode("-",$d_db );
	         //    $year = $arr[0];
	         //    $month = $arr[1];
	         //    $day = $arr[2];
           // }
	  ?>
		<div class="control-group">
		<label class="control-label">Ngày sinh </label>
		<div class="controls">
			<style type="text/css" media="screen">
				#years{width:95px;}
			</style>
		 @if(isset($rows->guest_birth))
		   <select class="span1" name="days" id="day_db">
				{{-- <option>-</option> --}}
					<?php
						$d_db=$rows->guest_birth;
						$day=substr($d_db,'8','9');
						for($d=1;$d<=31;$d++)
							{
					?>
					
								<option {{ $d==$day ? "selected='selected'" : "" }}> {{ $d }}</option>;

					<?php } ?> 
					
		 	</select>
			<select class="span1" name="months">
				{{-- <option>-</option> --}}
					<?php 
						$d_db=$rows->guest_birth;
						$month=substr($d_db,'5','6');
						for($m=1;$m<=12;$m++)
							{
					?>
								<option {{ $m==$month ? "selected='selected'" : "" }}> {{ $m }}</option>;
					<?php } ?> 
			</select>
			<select class="span1" id="years" name="years">
				{{-- <option>-</option> --}}
					<?php 
						$d_db=$rows->guest_birth;
						$year=substr($d_db,'0','3');

						for($y=1800;$y<=2017;$y++)
							{
					?>
								<option  {{ $y==$year ? "selected='selected'" : "" }}> {{ $y }}</option>;
					<?php } ?> 
			</select>				 
		 @else
		   <select class="span1" name="days">
				{{-- <option>-</option> --}}
					<?php 
						for($d=1;$d<=31;$d++)
							{
						?>
								<option> {{ $d }}</option>;
						<?php } ?> 
					
		 	</select>
			<select class="span1" name="months">
				{{-- <option>-</option> --}}
					<?php 
						for($m=1;$m<=12;$m++)
							{
					?>
								<option> {{ $m }}</option>;
					<?php } ?> 
			</select>
			<select class="span1" id="years" name="years">
				{{-- <option>-</option> --}}
					<?php 
						for($y=1800;$y<=2017;$y++)
							{
					?>
								<option> {{ $y }}</option>;
					<?php } ?> 
			</select>
		@endif
		</div>
	  </div>
	{{-- @if ($errors->any())
				 <div class="alert alert-danger">
				     <ul>
				         	@foreach ($errors->all() as $error)
				                <li style="list-style: none;">{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
	@endif --}}
	@if(Session::has('thongbao'))
	<div class="alert alert-success">{{ Session::get('thongbao') }}</div>
	@endif
 	<label style="margin-left: 70px;" >Nếu bạn có thông tin muốn sửa , hãy Click vào nút "Xác Nhận"</label>
	
	<div class="control-group">
		<div class="controls">
		 <input type="submit" style="margin-left: 20px;" name="submitAccount" value="Xác nhận" class="exclusive shopBtn">
		</div>
	</div>
	</form>
	@endforeach
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