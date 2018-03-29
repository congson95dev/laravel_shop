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
		<li class="active">Đơn hàng của bạn</li>
    </ul>
	<hr class="soften"/>
	<?php $dem=0; ?>	
	@foreach($checkout_detail as $rows)
	<?php $dem++; ?>
	<table class="table table-bordered table-condensed table_cart">
              <thead class="thead_cart">
                <tr>
                  <th>Sản phẩm</th>
                  <th>Mô tả</th>
                  <th>Màu sắc</th>
                  <th>Nguyên Liệu</th>
                  <th>Số lượng</th>
                  <th>Tổng Giá</th>
                  <th>Thông tin</th>
				</tr>
              </thead>
              <tbody class="tbody_cart">

                <tr >
                  <td><img width="80" src="{{ asset('assets/img/product/'.$rows->product_img) }}" alt=""></td>
                  <td class="count_cart_td" width="100">{{ $rows->product_name }}{{--<br> Carate : 22<br>Model : n/a --}}</td>
                  <td width="100">{{ $rows->att_color }}</td>
                  <td width="100">{{ $rows->att_material }}</td>
                  <td width="100">{{ $rows->product_number }}</td>
                  <td>{{ number_format($rows->product_totalprice) }} VNĐ</td>
                  <td><a href="{{ url('product_details/'.$rows->product_pk_id) }}">Xem</a></td>
                </tr>

				</tbody>
            </table><br/>
		@endforeach
		
	</div>
	</div>

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