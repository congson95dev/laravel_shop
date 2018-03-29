@extends('frontend.shop-cart.layout')
@section('controller')
<!-- 
Body Section 
-->
	<div class="row">

	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang Chủ</a> <span class="divider">/</span></li>
		<li class="active">Đơn hàng của tôi</li>
    </ul>
	<h3> Đơn Hàng Của Tôi</h3>	
	<hr class="soft"/>
	<div class="well">
		<table style="width: 100%; border: ridge;">
			<tr >
				<style type="text/css" media="screen">
					th{
						text-align: left;
						border: ridge;
					}
					td{
						border: ridge;
					}
				</style>
				<th>STT</th>
				<th>Nơi gửi hàng</th>
				<th>SĐT</th>
				<th style="width: 110px;">Tổng Giá</th>
				<th>Ngày đặt hàng</th>
				<th>Đã Nhận Tiền?</th>
				<th>Chi Tiết</th>
			</tr>
			
			<?php
				$n=0;
				// dd($checkout);
				foreach($checkout as $rows)
				{
					$n++;
			?>
					<tr>
						<td style="text-align: center;">{{ $n }}</td>
						<td>{{ $rows->checkout_place }}</td>
						<td>{{ $rows->checkout_mobile_number }}</td>
						<td>{{ number_format($rows->checkout_totalprice) }} VNĐ</td>
						<td>{{ substr($rows->checkout_time, 0,10) }}</td>
						<td>{{ ($rows->checkout_status)=='1'?'Đã nhận':'Chưa nhận' }}</td>
						<td><a href="{{ url('guest_checkout_detail/'.$rows->checkout_pk_id) }}">Xem</a></td>
					</tr>
			<?php } ?>
			
		</table>
	{{ $checkout->links() }}
		
	
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