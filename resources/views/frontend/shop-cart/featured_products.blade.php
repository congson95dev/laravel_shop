@extends('frontend.shop-cart.layout')
@section('controller')
	<div class="well well-small">
	<h3>Sản phẩm đặc sắc </h3>
		<div class="row-fluid">
		  <ul class="thumbnails">
		  	<?php 
		  		foreach($arr_featured_products as $rows_featured_products) { 
		  	?>
			<li class="span4">
			  <div class="thumbnail">
				<a href="product_details.html" class="overlay"></a>
				<a class="zoomTool" href="{{ url('featured_product_details/'.$rows_featured_products->product_pk_id) }}" title="add to cart"><span class="icon-search"></span> Xem thông tin</a>
				<a href="{{ url('product_details/'.$rows_featured_products->product_pk_id) }}">
					<img src="{{ asset('assets/img/product/'.$rows_featured_products->product_img) }}" alt=""></a>
				<div class="caption cntr">
					<p>{{ $rows_featured_products->product_name }}</p>
					<p><strong> {{ number_format($rows_featured_products->product_price) }} VNĐ</strong></p>
					<h4><a class="shopBtn" href="#" title="add to cart"> Thêm vào giỏ hàng </a></h4>
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
		<div>{{ $arr_featured_products->links() }}</div>
		</div>
	
	

	
	</div>

@endsection



