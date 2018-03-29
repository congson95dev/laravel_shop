
@extends('frontend.shop-cart.layout')
@section('controller')
	<div class="well well-small">
	<h3>Tìm Kiếm</h3>
		<div class="row-fluid">
		@if($count_search!='0')
		  <ul class="thumbnails">
		  	<?php 
		  		foreach($arr_search as $rows_search) { 
		  	?>
			<li class="span4">
			  <div class="thumbnail">
				<a href="product_details.html" class="overlay"></a>
				<a class="zoomTool" href="{{ url('product_details/'.$rows_search->product_pk_id) }}" title="add to cart"><span class="icon-search"></span> Xem thông tin</a>
				<a href="{{ url('product_details/'.$rows_search->product_pk_id) }}">
					<img src="{{ asset('assets/img/product/'.$rows_search->product_img) }}" alt=""></a>
				<div class="caption cntr">
					<p>{{ $rows_search->product_name }}</p>
					<p><strong> {{ number_format($rows_search->product_price) }} VNĐ</strong></p>
					<h4><a class="shopBtn" href="{{ url('add_to_cart/'.$rows_search->product_id) }}" title="add to cart"> Thêm vào giỏ hàng </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Add to Wish List </a> 
						<a class="pull-left" href="#"> Add to Compare </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
			<?php } ?>
		  </ul>
		  {{-- hien phan trang --}}
		  <div>{{ $arr_search->links() }}</div>
		@else
		<div class="span12" style="text-align: center;color:gray;font-size: 25px;">
			Có 0 kết quả được tìm kiếm với từ khóa '{{ $search_text }}' , <a href="{{ url('/') }}"><span style="font-size: 30px">click</span></a> để quay trở về trang chủ
		</div>
		@endif
		</div>
	
	

	
	</div>

@endsection



