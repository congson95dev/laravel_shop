
@extends('frontend.shop-cart.layout')
@section('controller')
	<div class="well well-small">
	<h3> Sản phẩm của chúng tôi </h3>
		<div class="row-fluid">
		  <ul class="thumbnails">
		  	<?php 
		  		foreach($arr_category as $rows_category) { 
		  	?>
			<li class="span4">
			  <div class="thumbnail">
				<a href="product_details.html" class="overlay"></a>
				<a class="zoomTool" href="{{ url('product_details/'.$rows_category->product_pk_id) }}" title="add to cart"><span class="icon-search"></span> Xem thông tin</a>
				<a href="{{ url('product_details/'.$rows_category->product_pk_id) }}">
					<img src="{{ asset('assets/img/product/'.$rows_category->product_img) }}" alt=""></a>
				<div class="caption cntr">
					<p>{{ $rows_category->product_name }}</p>
					<p><strong> {{ number_format($rows_category->product_price) }} VNĐ</strong></p>
					<h4><a class="shopBtn add_to_cart_main" data-id="{{ $rows_category->product_pk_id }}" 
			        data-price="{{ $rows_category->product_price }}" href="javascript:void(0)"  title="add to cart"> Thêm vào giỏ hàng </a></h4>
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
									$id = $rows_category->product_pk_id;
									if($id == $product_pk_id)
					                {
					                    $compair_ok = 0;
					                }
								}
							}
						@endphp
						<a class="pull-left add_to_compair_main {{ ($compair_ok == '1')?'':'added' }}"
						data-id="{{ $rows_category->product_pk_id }}" data-price="{{ $rows_category->product_price }}" title="So Sánh" 
						href="javascript:void(0)"> So Sánh </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
			<?php } ?>
		  </ul>
		  {{-- hien phan trang --}}
		  <div>{{ $arr_category->links() }}</div>
		</div>
	</div>
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



