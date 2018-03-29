{{-- cart ko the extend layout vi khong can left --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Web Shop laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet"/>
 
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <link href="{{ asset('style.css') }}" rel="stylesheet"/>

	<link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.ico') }}">
    

  </head>
<body>
	

	@include('frontend.shop-cart.header')
	<h3>Sản Phẩm Đang Bán </h3>
		<ul class="thumbnails">
			@foreach($arr_list_products as $rows)
			<li class="span3">
			  <div class="thumbnail">
				<a href="{{ url('product_details/'.$rows->product_pk_id) }}" class="overlay"></a>
				<a class="zoomTool" href="{{ url('product_details/'.$rows->product_pk_id) }}" title="Xem Chi Tiết"><span class="icon-search"></span> Xem Chi Tiết</a>
				<a href="{{ url('product_details/'.$rows->product_pk_id) }}"><img src="{{ asset('assets/img/product/'.$rows->product_img) }}" alt=""></a>
				<div class="caption cntr">
					<p>{{ $rows->product_name }}</p>
					<p><strong> {{ number_format($rows->product_price) }} VNĐ</strong></p>
					<h4><a class="shopBtn add_to_cart_main" data-id="{{ $rows->product_pk_id }}" 
		  			data-price="{{ $rows->product_price }}" href="javascript:void(0)" title="add to cart"> Thêm vào giỏ hàng </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Thêm vào chọn</a> 
						@php
							$compair_ok = 1;
							if(Session::has('compair'))
							{
								$compair_arr = Session::has('compair')?Session::get('compair'):'';
								foreach($compair_arr as $rows_compair)
								{
									$product_pk_id = $rows_compair['product_pk_id'];
									$id = $rows->product_pk_id;
									if($id == $product_pk_id)
					                {
					                    $compair_ok = 0;
					                }
								}
							}
						@endphp
						<a class="pull-left add_to_compair_main {{ ($compair_ok == '1')?'':'added' }}"
						data-id="{{ $rows->product_pk_id }}" data-price="{{ $rows->product_price }}" title="So Sánh" 
						href="javascript:void(0)"> Thêm vào so sánh </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
			@endforeach
		  </ul>

<div>{{ $arr_list_products->links() }}</div>
<!-- 
Clients 
-->
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
@include('frontend.shop-cart.footer')
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
    <script src="{{ asset('assets/js/shop.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.number.min.js') }}"></script>
	<script src="{{ asset('assets/js/cart.js') }}"></script>
	<script src="{{ asset('assets/js/compair.js') }}"></script>
  </body>
</html>