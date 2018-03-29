{{-- cart ko the extend layout vi khong can left --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fudu's Shop</title>
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

	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang chủ</a> <span class="divider">/</span></li>
		<li class="active">Giỏ hàng của bạn</li>
    </ul>
    @if(Cart::count()!=0)
	<div class="well well-small have_cart">
		<h1>Giỏ hàng của bạn <small class="pull-right" >Bạn đang có <span class="cart_count" value="{{ Cart::count() }}">{{ Cart::count() }}</span> sản phẩm trong giỏ hàng </small></h1>
	@endif
	<hr class="soften"/>
	<?php $dem=0; ?>	
	@foreach(Cart::content() as $rows)
	<?php $dem++; ?>
	<table class="table table-bordered table-condensed table_cart">
              <thead class="thead_cart">
                <tr>
                  <th>Sản phẩm</th>
                  <th>Mô tả</th>
                  <th>Màu sắc</th>
                  <th>Nguyên Liệu</th>
				  <th>Còn hàng</th>
                  <th>Giá</th>
                  <th>Số lượng </th>
                  <th>Tổng giá</th>
				</tr>
              </thead>
              <tbody class="tbody_cart">

                <tr >
                  <td><img width="100" src="{{ asset('assets/img/product/'.$rows->options->img) }}" alt=""></td>
                  <td class="count_cart_td" width="100">{{ $rows->name }}{{--<br> Carate : 22<br>Model : n/a --}}</td>
                  <td width="100">{{ $rows->options->att_color }}</td>
                  <td width="100">{{ $rows->options->att_material }}</td>
                  <td><span class="shopBtn">
                  	<?php
                  		$product_pk_id = $rows->id;
                  		$arr_product_stock = DB::table('shop_products')->where('product_pk_id','=',$product_pk_id)
                  							 ->select('product_stock')->first();
                  		$product_stock = $arr_product_stock->product_stock;
                  		if(isset($product_stock) && $product_stock > 0)
                  		{
                  			echo '<span class="icon-ok"></span>';
                  		}
                  		// dd($rows);
                  	?>
                  </span> </td>
                  <td>{{ number_format($rows->price) }} VNĐ</td>
                  @php
                  // dd($rows->id);
                  	$product = DB::table('shop_products')->where('product_pk_id',$rows->id)->select('product_stock')->first();
                  	$stock = $product->product_stock;
                  @endphp
                  <td>
						<input class="span1 qty_product" style="max-width:34px" id="appendedInputButtons cart_qty_product" size="16" type="number" data-id="{{ $rows->rowId }}" data-price="{{ $rows->price }}" 
						max="{{ $stock }}" min="0" value="{{ $rows->qty }}"  href="javascript:void(0)">
						  <div class="input-append">
								<a class="btn btn-mini qty_down" data-id="{{ $rows->rowId }}" data-price="{{ $rows->price }}" 
									href="javascript:void(0)">-</a>
								<a class="btn btn-mini qty_up" data-id="{{ $rows->rowId }}" data-price="{{ $rows->price }}" 
									data-stock="{{ $rows->options->stock }}" max="{{ $stock }}" href="javascript:void(0)"> + </a>
								<a  class="delete_cart" data-id="{{ $rows->rowId }}" data-price="{{ $rows->price }}" 
									data-stock="{{ $rows->options->stock }}" href="javascript:void(0)">
									<input type="submit" class="btn btn-mini btn-danger"  value="x">
								</a>
								<span class="icon-remove"></span>
						</div>
				  </td>
                  <td><p class="cart_subtotal" value="{{ $rows->subtotal }}">{{ number_format($rows->subtotal) }} VNĐ</p></td>
                </tr>
			
               
				 <tr>
                  <td colspan="6" class="alignR">Tổng giá sản phẩm (tính cả thuế) :	</td>
                  <td class="label label-primary"><span class="cart_total" value="{{ $rows->total }}">{{ number_format($rows->total) }}</span> VNĐ</td>
                </tr>
				</tbody>
            </table><br/>
		@endforeach
		@if(Cart::count()>0)
            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-inline" id="input_voucher" method="get" action="{{ url('voucher_use') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <label style="min-width:159px"> VOUCHERS Code: </label> 
				<input type="text" class="input-medium" placeholder="CODE" id="voucher" name="voucher_code">
				<input type="submit" class="shopBtn" value="Xác nhận"><br>
				<label id ="voucher-error" class="error" style="display: none; color:red; margin-left: 160px;" for="voucher"></label>
				<span class="input_voucher_success alert alert-success" id="input_voucher_success" style="display:none;"></span>
				
				  {{--  @if ($errors->has("voucher_code"))
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li style="list-style: none;">{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif --}}
				</form>
				</td>
                </tr>

					@if(Session::has('thongbao'))
						<div class="alert alert-success">{{ Session::get('thongbao') }}</div>
					@endif
					@if(Session::has('loi'))
						<div class="alert alert-danger">{{ Session::get('loi') }}</div>
					@endif
			</tbody>
				</table>
			<table class="table table-bordered">
			<tbody>
                <tr><td>ƯỚC TÍNH PHÍ VẬN CHUYỂN VÀ GỬI HÀNG</td></tr>
                 <tr> 
				 <td>
					{{-- <form class="form-horizontal" method="post"  action="{{ url('ship_calculate') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
					  <div class="control-group">
						<label class="span2 control-label" for="inputEmail" style="margin-left:0px;">Thành phố:</label>
						<div class="controls">
						 	<select name="country" id="country" style="margin-left:20px;">
						 		<option value="">-</option>
						 		@foreach($ship as $rows_ship)
						 		<option class="option_ship" data-price="{{ $rows_ship->ship_price }}" value="{{ $rows_ship->ship_city }}">{{ $rows_ship->ship_city }}</option>
						 		@endforeach
						 	</select>
						</div>
					  </div>
					 {{--  <div class="control-group">
						<div class="controls">
						  <a class="ship_calculate" value="Ấn để xem phí vận chuyển" href="javascript:void(0)" style="width: 200px;">
						</div>
					  </div> --}}
					  <span class="ship_result alert alert-success" style="display:none;"></span>
					 {{-- @if ($errors->has("country"))
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li style="list-style: none;">{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
					@endif --}}
					{{-- </form>  --}}
				  </td>
				  </tr>
              </tbody>
            </table>		
	<a href="{{ url('/') }}" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Về trang chủ </a>
	
		@if(Session::has('email'))
		<a href="{{ url('checkout_method') }}" class="shopBtn btn-large pull-right">Chọn Hình Thức Thanh toán <span class="icon-arrow-right"></span></a>
		@else
		<a href="{{ url('guest_login') }}" class="shopBtn btn-large pull-right">Bước tiếp theo <span class="icon-arrow-right"></span></a>
		@endif
	</div>
	@else
		<h1 style="text-align: center;" class="dont_have_cart" >
			
			<small>Giỏ hàng của bạn vẫn còn trống <br> hãy quay về <a href="{{ url('/') }}">trang chủ</a> để mua món hàng đầu tiên nào :D </small>
		</h1>

	@endif
	<h1 style="text-align: center; display: none;" class="dont_have_cart" >
			
			<small>Giỏ hàng của bạn vẫn còn trống <br> hãy quay về <a href="{{ url('/') }}">trang chủ</a> để mua món hàng đầu tiên nào :D </small>
		</h1>
	</div>
</div>
	<script type="text/javascript" charset="utf-8" async defer>
		function ajax_update(rowId,qty)
		{
			$.ajax({
				url:'{{ url("update_cart") }}',
				method:'GET',
				cache: false,
				data:{
					rowId:rowId,
					qty:qty
				}
			});
		}
		function ajax_remove(rowId)
		{
			$.ajax({
				url:'{{ url('delete_cart_ajax') }}',
				method:'GET',
				cache: false,
				data:{
					rowId:rowId
				}
			});
		}
		function ajax_remove_all_cart()
		{
			$.ajax({
				url:'{{ url('ajax_remove_all_cart') }}',
				method:'GET',
				cache: false,
			});
		}
		function ajax_input_voucher(voucher)
		{
			$.ajax({
				url:'{{ url("voucher_use") }}',
				method:'get',
				cache: false,
				data:{
					voucher:voucher
				},
				success: function(data)
				{
					if(!data.error)
					{
						total_header = parseInt($('#cart_total_header').text().replace(/,/gi,''));
						//console.log(data);
						total_header -= parseInt(total_header) * parseInt(data.voucher_effect) / 100;
						$('#cart_total_header').text($.number(total_header, 0, '.', ','));
				 		$('.input_voucher_success').text(data.message);
						$('.input_voucher_success').css('display','block');
						
					}
					else
					{
						$('.input_voucher_success').text(data.message);
						$('.input_voucher_success').css('display','block');
						
					}
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
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
  </body>
</html>