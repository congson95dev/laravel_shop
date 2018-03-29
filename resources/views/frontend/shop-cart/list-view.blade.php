@extends('frontend.shop-cart.layout')
@section('controller')

<div class="span9" style="margin-left: -2px;">
<div class="well well-small">
	@foreach($arr_list_products as $rows)
	<div class="row-fluid">	  
		<div class="span2">
			<img src="{{ asset('assets/img/product/'.$rows->product_img) }}" alt="">
		</div>
		<div class="span6">
			<h5>{{ $rows->product_name }}</h5>
			<p>
			{{ $rows->product_description }}
			</p>
		</div>
		<div class="span4 alignR">
		<form class="form-horizontal qtyFrm">
		<h3> {{ number_format($rows->product_price) }} VNĐ</h3>
		@php
					$compair_ok = 1;
					if(Session::has('compair'))
						{
						$compair_arr = Session::has('compair')?Session::get('compair'):'';
						foreach($compair_arr as $key => $rows_compair)
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
			<label class="checkbox">
				<input type="checkbox" class="add_to_compair_checked {{ ($compair_ok == '1')?'':'added' }}"
				data-id="{{ $rows->product_pk_id }}" data-price="{{ $rows->product_price }}"
				title="So Sánh" href="javascript:void(0)" {{ $compair_ok==0?'checked':'' }}>  Thêm vào mục so sánh
			</label><br>
		<div class="btn-group">
		  <a class="defaultBtn add_to_cart_main" data-id="{{ $rows->product_pk_id }}" 
		  data-price="{{ $rows->product_price }}" href="javascript:void(0)"><span class=" icon-shopping-cart"></span> 
		  Thêm vào giỏ hàng</a>
		  <a href="{{ url('product_details/'.$rows->product_pk_id) }}" class="shopBtn">Xem</a>
		 </div>
			</form>
		</div>
	</div>
	<hr class="soften">

	@endforeach
<div>{{ $arr_list_products->links() }}</div>
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
			function ajax_remove_by_checked(id)
		     {
		        $.ajax({
		          url:'{{ url('remove_one_compair_by_checked_ajax') }}',
		          method:'GET',
		          cache: false,
		          data:{
		            id:id
		          }
		        });
		     }
		     function ajax_remove_all_compair()
		     {
		        $.ajax({
		          url:'{{ url('ajax_remove_all_compair') }}',
		          method:'GET',
		          cache: false,
		        });
		     }
	</script>
@endsection