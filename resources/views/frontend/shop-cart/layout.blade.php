<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fudu's Shop - Welcome ^^</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <script src="https://<ajax class="googleapis co"></ajax>m/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet"/> --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    {{-- <link href="{{ asset('assets/css/bootstrap-theme.min.css') }}" rel="stylesheet"/> --}}
    <link href="{{ asset('style.css') }}" rel="stylesheet"/>
	  <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="shortcut icon" href="{{ asset('assets/ico/favicon.ico') }}">
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> --}}
  </head>
<body>
	@include('frontend.shop-cart.header')
	<div class="row">
		@include('frontend.shop-cart.left')
		<div class="span9">
			@yield('controller')
		</div>
	</div>
	@include('frontend.shop-cart.footer')
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> --}}

     {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    {{-- <script src="{{ asset('assets/js/bootstrap.js') }}"></script> --}}
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