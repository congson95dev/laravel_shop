@extends('frontend.shop-cart.layout')
@section('controller')

	<div class="span9 span9_reload">
    <ul class="breadcrumb">
    <li><a href="{{ url('/') }}">Trang chủ</a> <span class="divider">/</span></li>
    <li><a href="{{ url('products') }}">Sản phẩm</a> <span class="divider">/</span></li>
    <li class="active">Thông tin sản phẩm</li>
    </ul>	
	<div class="well well-small">
	<div class="row-fluid">
			<div class="span5">
			<div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="#"> <img src="{{ asset('assets/img/product/'.$product_details->product_img) }}"" alt="" style="width:100%"></a>
                  </div>
                </div>
               
            </div>
			</div>
			<div class="span7">
				<h3>{{ $product_details->product_name }} [{{ number_format($product_details->product_price) }} VNĐ]</h3>
				<hr class="soft"/>
				
				<form class="form-horizontal qtyFrm add_to_cart_product_detail" data-id="{{ $product_details->product_pk_id }}"
				 data-price="{{ $product_details->product_price }}" method="POST" action="{{ 'add_to_cart_ajax' }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="control-group">
					<label class="control-label"><span name="att_price">Số Lượng</span></label>
					<div class="controls">
					<input type="number" min="0" max="{{ isset($cart_qty_product_details)?$product_details->product_stock - $cart_qty_product_details:$product_details->product_stock }}" value="{{ isset($cart_qty_product_details)&&$product_details->product_stock - $cart_qty_product_details == 0 ? 0 : 1 }}" class="span6 qty" name="qty" id="product_details_qty" placeholder="Qty.">
					</div>
				  </div>
			
				
				  <div class="control-group">
					<label class="control-label"><span>Màu</span></label>
					<div class="controls">
					  	<select class="span11 att_color"  name="att_color">
					  	  @foreach($arr_color as $rows_product_detail)
						  		<option value="{{ $rows_product_detail->att_color }}">{{ $rows_product_detail->att_color }}</option>
						  @endforeach
						</select>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label"><span>Chất liệu</span></label>
					<div class="controls">
					  	<select class="span11 att_material"  name="att_material">
					  	@foreach($arr_material as $rows_product_detail)
						   <option value="{{ $rows_product_detail->att_material }}">{{ $rows_product_detail->att_material }}</option>
						@endforeach
						</select>
					</div>
				  </div>
			
				  <h4>{{ $product_details->product_stock }} sản phẩm còn bán </h4>
				  <p>
				  	{{-- hàm loại bỏ các thẻ trong html --}}
				  	{{  $product_details->product_description }}
				  <p>
				  <button type="submit" class="shopBtn submit" data-id="{{ $product_details->product_pk_id }}"
				 data-price="{{ $product_details->product_price }}"><span class=" icon-shopping-cart"></span> Thêm vào giỏ hàng</button>
				</form>
			</div>
			</div>
				<hr class="softn clr"/>


            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Thông tin về sản phẩm</a></li>
              <li class=""><a href="#profile" data-toggle="tab">Các sản phẩm liên quan </a></li>
             
            </ul>
            <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
			  <h4>Thông tin về sản phẩm</h4>
                <table class="table table-striped">
				<tbody>
				<tr class="techSpecRow"><td class="techSpecTD1">Màu:</td><td class="techSpecTD2">
				@foreach($arr_color as $rows_product_detail)
						{{ $rows_product_detail->att_color.',' }}
				@endforeach
				</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Kiểu dáng:</td><td class="techSpecTD2">
					{{ isset($product_details->product_style) ? $product_details->product_style : 'Đang Cập Nhật' }}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Mùa:</td><td class="techSpecTD2">
					{{ isset($product_details->product_season) ? $product_details->product_season : 'Đang Cập Nhật'}}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Thích hợp sử dụng:</td><td class="techSpecTD2">
					{{ isset($product_details->product_usage) ? $product_details->product_usage : 'Đang Cập Nhật'  }}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Thể thao:</td><td class="techSpecTD2">
					{{ isset($product_details->product_sport) ? $product_details->product_sport : 'Đang Cập Nhật'  }}</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Hãng sản xuất:</td><td class="techSpecTD2">
					{{ isset($product_details->product_brand) ? $product_details->product_brand : 'Đang Cập Nhật'  }}</td></tr>
				</tbody>
				</table>
				{{-- hàm loại bỏ các thẻ trong html --}}
				{!! $product_details->product_content !!}

			</div>
			{{-- <script type="text/javascript">
				$(document).ready(function(){
					$(" .soft:nth-child(1)").attr("class","");
				});
			</script> --}}
			<div class="tab-pane fade" id="profile">
				  <?php 
				  		foreach($other_products as $rows_other_products) 
				  			{
				  ?>
			<hr class="soft"/>
			<div class="row-fluid">
				
			<div class="span2">
				<img src="{{ asset('assets/img/product/'.$rows_other_products->product_img) }}" alt="">
			</div>
			<div class="span6">
				<h5>{{ $rows_other_products->product_name }} </h5>
				<p>
				{{ $rows_other_products->product_description }}
				</p>
			</div>
			<div class="span4 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> {{ number_format($rows_other_products->product_price) }} VNĐ</h3>
			@php
					$compair_ok = 1;
					if(Session::has('compair'))
						{
						$compair_arr = Session::has('compair')?Session::get('compair'):'';
						foreach($compair_arr as $key => $rows_compair)
							{
								$product_pk_id = $rows_compair['product_pk_id'];
								$id = $rows_other_products->product_pk_id;
								if($id == $product_pk_id)
						        {
						            $compair_ok = 0;
						        }
							}
						}
			@endphp
			<label class="checkbox">
				<input type="checkbox" class="add_to_compair_checked {{ ($compair_ok == '1')?'':'added' }}"
				data-id="{{ $rows_other_products->product_pk_id }}" data-price="{{ $rows_other_products->product_price }}"
				title="So Sánh" href="javascript:void(0)" {{ $compair_ok==0?'checked':'' }}>  Thêm vào mục so sánh
			</label><br>
			<div class="btn-group">
			  <a class="defaultBtn add_to_cart_main" data-id="{{ $rows_other_products->product_pk_id }}" 
			  data-price="{{ $rows_other_products->product_price }}" href="javascript:void(0)"><span class=" icon-shopping-cart"></span> Thêm vào giỏ hàng</a>
			  <a href="{{ url('product_details/'.$rows_other_products->product_pk_id) }}" class="shopBtn">XEM</a>
			 </div>
				</form>
			</div>
					
			</div>
	
			
					<?php } ?>
					{{-- hien phan trang --}}
					<div>{{ $other_products->links() }}</div>
			</div>
         
       
			</div>
		</div>
      </div>
	<script type="text/javascript" charset="utf-8" async defer>
		 	function ajax_add_product_detail(id,qty,color,material)
			{
				$.ajax({
					url:'{{ url("add_to_cart_ajax") }}',
					method:'POST',
					data: {
						id:id,
						qty:qty,
						color:color,
						material:material
					}
				});
			}
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