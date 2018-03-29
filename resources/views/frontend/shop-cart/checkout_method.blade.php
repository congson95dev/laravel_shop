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
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
	
  </head>
<body>
	

	@include('frontend.shop-cart.header')

	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang chủ</a> <span class="divider">/</span></li>
		<li><a href="{{ url('cart') }}">Giỏ hàng</a> <span class="divider">/</span></li>
		<li class="active">Chọn phương thức thanh toán</li>
    </ul>
	<div class="well well-small">
	<hr class="soften"/>
            <table class="table table-bordered">
			<tbody>
				<tr><td>THÔNG TIN CỦA BẠN</td></tr>
                 <tr> 
				 <td>
					<form class="form-horizontal input_info" id="input_info" method="get" action="{{ url('info') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					  <div class="control-group">
						<label class="span2 control-label"  for="inputCity">Tỉnh/Thành phố:</label>
						<div class="controls">
						  <select name="city" id="city">
						  	<option value="0">-Chọn-</option>
					 		@foreach($ship as $rows_ship)
					 		<option class="option_city" value="{{ $rows_ship->ship_city }}">{{ $rows_ship->ship_city }}</option>
					 		@endforeach
						  </select>
						  <label id ="city-error" class="error" style="display: none; color:red" for="city"></label>
						</div>
					  </div>
					  <div class="control-group">
						<label class="span2 control-label"  for="inputCity">Quận/Huyện:</label>
						<div class="controls">
						{{-- county = quận --}}
						  <select name="county" id="county">
						  	<option value="0">-Chọn-</option>
					 		{{-- @foreach($county as $rows_county)
					 		<option class="option_city" value="{{ $rows_county->county_name }}">{{ $rows_county->county_name }}</option>
					 		@endforeach --}}
						  </select>
						  <label id ="county-error" class="error" style="display: none; color:red" for="county"></label>
						</div>
					  </div>
					  {{--  <div class="control-group">
						<label class="span2 control-label"  for="inputCity">Phường/Xã:</label>
						<div class="controls">
						  <select name="ward" id="ward">
						  	<option value="0">-Chọn-</option>
					 		@foreach($ship as $rows_ship)
					 		<option class="option_city" value="{{ $rows_ship->ship_city }}">{{ $rows_ship->ship_city }}</option>
					 		@endforeach
						  </select>
						  <label id ="ward-error" class="error" style="display: none; color:red" for="ward"></label>
						</div>
					  </div> --}}
					  <div class="control-group">
						<label class="span2 control-label"  for="inputPlace">Nơi nhận hàng:</label>
						<div class="controls">
						  <input type="text" name="place" id ="place" placeholder="Nơi nhận hàng">
						  <label id ="place-error" class="error" style="display: none; color:red" for="place"></label>
						</div>
					  </div>
					  <div class="control-group">
						<label class="span2 control-label"  for="inputNumber">Số điện thoại:</label>
						<div class="controls">
						  <input type="text" name="mobile_number" id ="mobile_number" placeholder="Số điện thoại">
						  <label id ="mobile_number-error" class="error" style="display: none; color:red" for="mobile_number"></label>
						</div>
					  </div>
					  <div class="control-group">
						<div class="controls">
						  <input type="submit" class="shopBtn" value="Xác nhận">
						</div>
						<span class="input_info_success alert alert-success" style="display:none;"></span>
						{{-- @if ($errors->any())
				   		 <div class="alert alert-danger">
				        	<ul>
				           		 @foreach ($errors->all() as $error)
				              		 <li style="list-style: none;">{{ $error }}</li>
				         		 @endforeach
				       		 </ul>
				    	 </div>
						@endif --}}
					  </div>
					</form> 
				  </td>
				  </tr>
				<tr><td>CHỌN PHƯƠNG THỨC THANH TOÁN</td></tr>
				<tr>
					<td>
						<h3>Paypal Payment</h3><br>
						<a href="{{ url('checkout_method/paypal') }}" >
						<img src="{{ asset('assets/img/paypal_btn.png') }}" style="width: 190px; height: 70px; margin-top: -30px;" onclick="return confirm('Bạn có chắc chắn muốn thực hiện giao dịch này?');">
						</a>
					</td>
					<td>
						<h3>Thanh toán trực tiếp</h3><br>
						<a href="{{ url('normal_checkout') }}" onclick="return confirm('Bạn có chắc chắn muốn thực hiện giao dịch này?');">
						<img src="{{ asset('assets/img/normal_checkout.png') }}" style="width: 70px; height: 70px; margin-top: -30px;">
						</a>
					</td>
				</tr>
			</tbody>
			</table>
	<a href="{{ url('cart') }}" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Về giỏ hàng </a>
	<a href="{{ url('/') }}" class="shopBtn btn-large pull-right">Về trang chủ <span class="icon-arrow-right"></span></a>
		
</div>
</div>
</div>

<script type="text/javascript" charset="utf-8" async defer>
		function ajax_input_info(place,mobile_number,city,county)
		{
			$.ajax({
				url:'{{ url("info") }}',
				method:'get',
				cache: false,
				data:{
					place:place,
					mobile_number:mobile_number,
					city:city,
					county:county
				}
			});
		}
		function ajax_county(city)
		{
			$.ajax({
				url:'{{ url("county") }}',
				method:'get',
				cache: false,
				dataType: 'json',
				data:{
					city:city
				},
			})
			.done(function(data) 
			{
				var html = '<option selected value="0">-Chọn-</option>';
				data.forEach(function(county){
					html += '<option value="'+county.county_name+'">'+county.county_name+'</option>'
				});
				$('#county').html(html);
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
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
  </body>
</html>