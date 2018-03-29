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

	<hr class="soften">
	<div class="well well-small">
	<h1>Địa chỉ của Shop</h1>
	<hr class="soften"/>	
	<div class="row-fluid">
		<div class="span8 relative">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29794.698670970087!2d105.78885509999999!3d21.019184300000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa759b0e266deef03!2sYen+Hoa+Secondary+School!5e0!3m2!1sen!2s!4v1517623348106" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		
		<div class="span4">
		<h4>Gửi E-mail Cho Shop</h4>
		<form class="form-horizontal" method="post" action="{{ url('post_contact_us') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset>
          <div class="control-group">
           
              <input type="text" name="name" placeholder="Họ và Tên" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="email" name="email" placeholder="E-mail" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" name="subject" placeholder="Chủ Đề" class="input-xlarge"/>
          
          </div>
          <div class="control-group">
              <textarea rows="3" name="content" id="textarea" class="input-xlarge"></textarea>
           
          </div>

           <button class="shopBtn" type="submit">Gửi E-mail</button>

        </fieldset>
      </form>
      @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="list-style: none;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      @if(Session::has('thongbao'))
      <div class="alert alert-success">{{ Session::get('thongbao') }}</div>
      @endif
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
    <script src="{{ asset('assets/js/jquery.number.min.js') }}"></script>
	<script src="{{ asset('assets/js/cart.js') }}"></script>
  </body>
</html>