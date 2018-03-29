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
	
    <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.ico') }}">
    

  </head>
<body>
	

	@include('frontend.shop-cart.header')

	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang chủ</a> <span class="divider">/</span></li>
		<li><a href="{{ url('cart') }}">Giỏ hàng của bạn </a><span class="divider">/</span></li>
		<li class="active">Thanh toán</li>
    </ul>
	<div class="well well-small">
		<h1>Thanh toán <small class="pull-right">Bạn đang có {{ Cart::count() }} sản phẩm trong giỏ hàng </small></h1>
	<hr class="soften"/>
	<?php $dem=0; ?>	
	@foreach(Cart::content() as $rows)
	<?php $dem++; ?>
	<table class="table table-bordered table-condensed">
              <thead>
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
              <tbody>

                <tr>
                  <td><img width="100" src="{{ asset('assets/img/product/'.$rows->options->img) }}" alt=""></td>
                  <td>{{ $rows->name }}{{--<br> Carate : 22<br>Model : n/a --}}</td>
                  <td>{{ $rows->options->att_color }}</td>
                  <td>{{ $rows->options->att_material }}</td>
                  <td><span class="shopBtn"><span class="icon-ok"></span></span> </td>
                  <td>{{ number_format($rows->price) }} VNĐ</td>
                  <td>
					<input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" 
					value="{{ $rows->qty }}" onchange="">
				  <div class="input-append">
					<button class="btn btn-mini" type="button">-</button>
					<button class="btn btn-mini" type="button"> + </button>
					<a  href="{{ url('delete_cart/'.$rows->rowId) }}">
						<input type="submit" class="btn btn-mini btn-danger"  value="x"></button>
					</a>
					<span class="icon-remove"></span></button>
				</div>
				</td>
                  <td>{{ number_format($rows->subtotal) }} VNĐ</td>
                </tr>
			
               
				 <tr>
                  <td colspan="6" class="alignR">Tổng giá sản phẩm (tính cả thuế) :	</td>
                  <td class="label label-primary">{{ number_format($rows->total) }} VNĐ</td>
                </tr>
				</tbody>
            </table><br/>
		@endforeach
		
  
			<table class="table table-bordered">
			<tbody>
                <tr><td>THÔNG TIN CỦA BẠN</td></tr>
                 <tr> 
				 <td>
					<form class="form-horizontal" method="post" action="{{ url('checkout') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					  <div class="control-group">
						<label class="span2 control-label"  for="inputPlace">Nơi nhận hàng:</label>
						<div class="controls">
						  <input type="text" name="place" placeholder="Nơi nhận hàng">
						</div>
					  </div>
					  <div class="control-group">
						<label class="span2 control-label"  for="inputNumber">Số điện thoại:</label>
						<div class="controls">
						  <input type="text" name="mobile_number" placeholder="Số điện thoại">
						</div>
					  </div>
					  <div class="control-group">
						<div class="controls">
						  <input type="submit" class="shopBtn" value="Thanh toán">
						</div>
						@if ($errors->any())
				   		 <div class="alert alert-danger">
				        	<ul>
				           		 @foreach ($errors->all() as $error)
				              		 <li style="list-style: none;">{{ $error }}</li>
				         		 @endforeach
				       		 </ul>
				    	 </div>
						@endif
					  </div>
					</form> 
				  </td>
				  </tr>
              </tbody>
            </table>		
	<a href="{{ url('cart') }}" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Về giỏ hàng </a>


</div>
</div>
</div>
@include('frontend.shop-cart.footer')
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo-1.4.3.1-min.js') }}"></script>
    <script src="{{ asset('assets/js/shop.js') }}"></script>
  </body>
</html>