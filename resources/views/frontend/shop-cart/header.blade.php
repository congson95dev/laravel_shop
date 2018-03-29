
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<a href="{{ url('/') }}"><span class="icon-twitter"></span></a>
					<a href="https://www.facebook.com/saxsax1995"><span class="icon-facebook"></span></a>
					<a href="{{ url('/') }}"><span class="icon-youtube"></span></a>
					<a href="{{ url('/') }}"><span class="icon-tumblr"></span></a>
				</div>
				<a class="{{ Request::segment(1) == '' ? 'active' : '' }}" href="{{ url('/') }}"> <span class="icon-home"></span> Trang Chủ</a> 

				@if(Session::has('email'))
					<a class="{{ Request::segment(1) == 'guest_accout' ? 'active' : '' }}" href="{{ url('guest_accout') }}"><span class="icon-user"></span> Tài Khoản </a> 
					<a class="{{ Request::segment(1) == 'guest_checkout' ? 'active' : '' }}" href="{{ url('guest_checkout') }}"><span class="fa fa-eye"></span> Đơn Hàng Của Tôi </a> 
					<a class="{{ Request::segment(1) == 'contact_us' ? 'active' : '' }}" href="{{ url('contact_us') }}"><span class="icon-envelope"></span> Liên Hệ </a>
					<a href="{{ url('logout') }}"><span class="icon-user"></span> Đăng Xuất</a> 
				@else
					<a class="{{ Request::segment(1) == 'guest_login' ? 'active' : '' }}" href="{{ url('guest_login') }}"><span class="icon-user"></span> Đăng Nhập</a> 
					<a class="{{ Request::segment(1) == 'guest_register_account' ? 'active' : '' }}" href="{{ url('guest_register_account') }}"><span class="icon-edit"></span> Đăng Ký </a>
					<a class="{{ Request::segment(1) == 'contact_us' ? 'active' : '' }}" href="{{ url('contact_us') }}"><span class="icon-envelope"></span> Liên hệ với chúng tôi</a>
				@endif 
				<a class="{{ Request::segment(1) == 'compair' ? 'active' : '' }}" href="{{ url('compair') }}" style="width: 90px"><i class="fa fa-balance-scale"></i>
				<?php
				$count=0;
				if(Session::has('compair'))
				{
					foreach(Session::get('compair') as $rows_compair)
					{	
						$count++;
					}
				}
				?>
				[<span class="compair_count_header">{{ $count }}</span>]So Sánh</a>	
				<a class="{{ Request::segment(1) == 'cart' ? 'active' : '' }}" href="{{ url('cart') }}"><span class="icon-shopping-cart"></span>
				<span class="cart_count_header">
				<?php 

					if(Cart::count()!=0)
						{
							echo Cart::count();
						}
						else
						{
							echo "0 ";
						} 
				?> </span> Sản phẩm(s) -
				<span class="badge badge-warning">
				<span class="cart_total_header" id="cart_total_header" val="{{ Cart::total(0) }}">
				<?php 
					 if(Cart::total()!=0)
						{
							
									// 0 la so luong so 0 sau dau' , 1 thi` co 1 so 0 , 2 thi co 2 so 0
									// . (cham') la dau' giua~ cac so'
									// , (phay) la dau' sau cac so' , ngan cach giua~ so' vs phan` thap phan
									// VD : 3.120.200,00  
									// echo Cart::total(0,'.',',');
									echo number_format(Cart::total(0));

							
						}
						else
						{
							echo "0";
						}
					
				?>
				</span> VNĐ</span></a>
				
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="{{ url('/') }}">
		<img src="{{ asset('assets/img/logo-bootstrap-shoping-cart.png') }}" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	<div class="offerNoteWrapper">
	<h1 class="dotmark">
	<i class="icon-cut"></i>
	<div style="text-align: center;"> Fudu's WebShop :"3 </div>
	</h1>
	</div>
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) :  0167 919 7968 </strong><br><br></p>
	<span class="btn btn-mini"><a href="{{ url('cart') }}">[<span class="cart_count_header_n2">{{ Cart::count() }}</span>] <span class="icon-shopping-cart"></span></a></span>
	<span class="btn btn-warning btn-mini">VNĐ</span>
	<span class="btn btn-mini">$</span>
	<span class="btn btn-mini">&euro;</span>
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
			  <li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="{{ url('/') }}">Trang Chủ</a></li>
			  <li class="{{ Request::segment(1) == 'list_view' ? 'active' : '' }}"><a href="{{ url('list_view') }}">Danh Sách</a></li>
			  <li class="{{ Request::segment(1) == 'products' ? 'active' : '' }}"><a href="{{ url('products') }}">Sản Phẩm</a></li>
			  <li class="{{ Request::segment(1) == 'three_col' ? 'active' : '' }}"><a href="{{ url('three_col') }}">Hiển Thị 3</a></li>
			  <li class="{{ Request::segment(1) == 'four_col' ? 'active' : '' }}"><a href="{{ url('four_col') }}">Hiển Thị 4</a></li>
			</ul>
			<form action="{{ url('search_frontend') }}" method="get" class="navbar-search pull-left" style="margin-left: 130px">
			  <input type="text" placeholder="Tìm Kiếm" name="search_text" class="search-query span2" {{ Session::has('email') ? "style=width:280px;" : "" }}>
			</form>
			@if(!Session::has('email'))
			<ul class="nav pull-right">
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm" method="post" action="{{ url('guest_login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <div class="control-group">
					<input type="text" class="span2" id="inputEmail" name="gl_email" placeholder="Email">
				  </div>
				  <div class="control-group">
					<input type="password" class="span2" id="inputPassword" name="gl_password" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
					<input type="submit" class="shopBtn btn-block" value="Đăng nhập">
				  </div>
				</form>
				</div>
			</li>
			</ul>
			@endif
		  </div>
		</div>
	  </div>
	</div>
