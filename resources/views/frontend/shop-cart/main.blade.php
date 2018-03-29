@extends('frontend.shop-cart.layout')
@section('controller')

{{ Counter::count('/') }}
	{{-- <a href="" title="" ><span style="background: ;position: fixed;top: 300px;right: 40px;color: #0012ff;" id="demHang">{{ Cart::count() }}</span><img id="basket" class="icon icon-shopping-cart icon-2x" style="height: 100px;width: 100px;position: fixed;top: 300px;right: 0px;" src="{{ $publicUrl }}/cart.png" alt="" class="img-responsive"></a> --}}
<div class="well np">
		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
			
              <?php 
              	$n="1";
		  		foreach($arr_adv as $rows_adv) 
		  			{
		  				
		  				if($n=="1")
		  				{
		  					echo "<div class='item active'>";
		  				}
		  				else
		  				{
		  					echo "<div class='item'>";
		  				}
			 	 ?>
					  	<img style='width:100%' src='{{ asset('assets/img/'.$rows_adv->adv_image) }}' alt='bootstrap ecommerce templates'>
		                <div class='carousel-caption'>
		                      <h4>{{ $rows_adv->adv_name }}</h4>
		                      <p><span>{{ $rows_adv->adv_description }}</span></p>
		               <?php echo "</div>"; ?>
		              </div>
			<?php $n++;  } ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
  </div>
  <!--
New Products
-->
{{-- 	<script type="text/javascript">
		$(document).ready(function(){
			$(".test > .item:nth-child(1)").attr("class","item active");
		});
	</script> --}}
	<div class="well well-small">
	<h3> Sản Phẩm Mới </h3>
	<hr class="soften"/>
		<div class="row-fluid">
		<div id="newProductCar" class="carousel slide">
      <div class="carousel-inner">
           	<?php
           		$m=-1;
    	  		$n=0;
          		foreach($arr_new_products as $rows_new_products) 
      			{
      				$m++;
      				if($m%4==0)
      				{
	      					$n++;
	      					if($n==1)
	      					{
	      						echo "<div class='item active'>
							  			<ul class='thumbnails'>";
	      					}
	      					else
	      					{
	  						 	echo "<div class='item'>
						  			<ul class='thumbnails'>";
	      					}
		  			}
		  			
		  	?>
				 <li class="span3">
					 <div class="thumbnail">
					 	<a class="zoomTool" href="{{ url('product_details/'.$rows_new_products->product_pk_id) }}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					 	<a href="#" class="tag"></a>
					 	<a href="{{ url('product_details/'.$rows_new_products->product_pk_id) }}"><img src="{{ asset('assets/img/product/'.$rows_new_products->product_img) }}" alt="bootstrap-ring"></a>
					 </div>
				 </li>
					 <?php
				 	if($m%4==3)
				 		echo "</ul>
							</div>";
			  } 
			  ?>
		   </div>
			  <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
              <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
		  </div>
		  </div>
		  <style type="text/css">
		  	.carousel-control.right{
               right: 15600px;
		  	}
		  </style>
		<div class="row-fluid">
		  <ul class="thumbnails">

		  	<?php 

		  		foreach($arr_products as $rows_products) 
		  			{
			?>
				<li class="span4">
				  <div class="thumbnail">
					 
					<a class="zoomTool" href="{{ url('product_details/'.$rows_products->product_pk_id) }}" title="Xem thông tin"><span class="icon-search"></span> Xem thông tin</a>
					<a href="{{ url('product_details/'.$rows_products->product_pk_id) }}"><img id="{{$rows_products->product_pk_id}}" src="{{ asset('assets/img/product/'.$rows_products->product_img  ) }}" alt=""></a>
					<div class="caption cntr">
						<p>{{ $rows_products->product_name }}</p>
						<p><strong> {{ number_format($rows_products->product_price) }} VNĐ </strong></p>
						<a class="shopBtn main add_to_cart_main" data-id="{{ $rows_products->product_pk_id }}" data-price="{{ $rows_products->product_price }}" title="Thêm vào giỏ hàng" href="javascript:void(0)"><h4 style="font-size: 17px;"> Thêm vào giỏ hàng </h4></a>
						<div class="actionList">
							<a class="pull-left" href="#">Add to Wish List </a> 
							@php
							$compair_ok = 1;
							if(Session::has('compair'))
							{
								$compair_arr = Session::has('compair')?Session::get('compair'):'';
								foreach($compair_arr as $rows_compair)
								{
									$product_pk_id = $rows_compair['product_pk_id'];
									$id = $rows_products->product_pk_id;
									if($id == $product_pk_id)
					                {
					                    $compair_ok = 0;
					                }
								}
							}
							@endphp
							<a class="pull-left add_to_compair_main {{ ($compair_ok == '1')?'':'added' }}"
							data-id="{{ $rows_products->product_pk_id }}" data-price="{{ $rows_products->product_price }}" title="So Sánh" href="javascript:void(0)"> So Sánh </a>
						</div> 
						<br class="clr">
					</div>
				  </div>
				</li>
			<?php  }?>

		  </ul>
		</div>
	</div>
	<!--
	Featured Products
	-->
		<div class="well well-small">
		  <h3><a class="btn btn-mini pull-right" href="{{ url('featured_product') }}" title="View more">Xem thêm <span class="icon-plus"></span></a> Sản Phẩm Đặc Sắc </h3>
		  <hr class="soften"/>
		  <div class="row-fluid">
		  <ul class="thumbnails">

		  	<?php 
		  		$count = 1;
		  		foreach($arr_featured_products as $rows_featured_products) 
		  			{
		  				if($count<=3)
		  				{
			?>
			<li class="span4">
			  <div class="thumbnail">
				<a class="zoomTool" href="{{ url('product_details/'.$rows_featured_products->product_pk_id) }}" title="Xem thông tin"><span class="icon-search"></span> Xem thông tin</a>
				<a  href="{{ url('product_details/'.$rows_featured_products->product_pk_id) }}">
					<img src="{{ asset('assets/img/product/'.$rows_featured_products->product_img) }}" alt=""></a>
				<div class="caption">
				  <h5 class="featured_product_name">{{ $rows_featured_products->product_name }}</h5>
				  <h4>
					  <a class="defaultBtn" href="{{ url('product_details/'.$rows_featured_products->product_pk_id) }}" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn add_to_cart_main" data-id="{{ $rows_products->product_pk_id }}" data-price="{{ $rows_products->product_price }}" title="Thêm vào giỏ hàng" href="javascript:void(0)"><span class="icon-plus"></span></a>
					  <span class="pull-right">{{ number_format($rows_featured_products->product_price) }} VNĐ</span>
				  </h4>
				</div>
			  </div>
			</li>
			<?php } $count++; } ?>
		  </ul>	
	</div>
	</div>
	
	<div class="well well-small">
	<a class="btn btn-mini pull-right" href="{{ url('product_common') }}">Xem thêm <span class="icon-plus"></span></a>
	Sản phẩm Phổ Biến
	</div>
	<hr>
	<div class="well well-small">
	<a class="btn btn-mini pull-right" href="{{ url('product_bestsell') }}">Xem thêm <span class="icon-plus"></span></a>
	Các Sản Phẩm Bán Chạy Nhất
	</div>
	{{-- </div> --}}

	<script type="text/javascript" charset="utf-8" async defer>
		 	function ajax_add(id)
			{
				$.ajax({
					url:'{{ url("add_to_cart_ajax") }}',
					method:'GET',
					cache: false,
					data:{
						id:id,
					}
				});
			}
			function ajax_add_compair(id)
			{
				$.ajax({
					url:'{{ url("add_to_compair_ajax") }}',
					method:'GET',
					cache: false,
					data:{
						id:id,
					}
				});
			}
	</script>

@endsection