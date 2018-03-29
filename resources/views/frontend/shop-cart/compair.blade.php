@extends('frontend.shop-cart.layout')
@section('controller')
	</div>
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="{{ url('/') }}">Trang Chủ</a> <span class="divider">/</span></li>
		<li class="active">So Sánh Sản Phẩm</li>
    </ul>
  @php
		$count=0;
	@endphp
	
  @if(Session::has('compair'))
  <div class="well well-small have_compair">
  <h3> So Sánh Sản Phẩm
  <small class="pull-right"> 
	@foreach(Session::get('compair') as $rows_compair)
	@php
		$count++;
	@endphp
	@endforeach
	<span class="count_compair">{{ $count }}</span> sản phẩm đang được so sánh </small></h3>	
	<hr class="soft"/>
  <div style="width: 680px; overflow: auto;">
	<table id="compairTbl" class="table table-bordered">
		
          
                <tr>
                  <th>Features</th>
                  @foreach(Session::get('compair') as $key => $rows_compair)
                  <th class="th_compair_1">{{ $rows_compair['product_name'] }}
                  <a href="javascript:void(0)" class="remove_one_compair_ajax" data-id="{{ $rows_compair['product_pk_id'] }}" data-key="{{ $key }}">
                    <span class="fa fa-remove" style="background: red; color:white; width: 20px; height:20px; float:right; text-align: center;"></span>
                  </a>
                  </th>
                  @endforeach
                </tr>
          
                <tr>
                    <td>&nbsp;</td>
            				@foreach(Session::get('compair') as $rows_compair)
                      <td class="compair_td count_compair_td" data-id="{{ $rows_compair['product_pk_id'] }}">
            					<p class="justify product_description" style="height: 150px;width: 270px;">
            						{{ $rows_compair['product_description'] }}
            					</p>
            				<img src="{{ asset('assets/img/product/'.$rows_compair['product_img']) }}" class="product_img" alt=""/>
            				<form class="form-horizontal qtyFrm compair_form">
            				<h3>{{ number_format($rows_compair['product_price']) }} VNĐ</h3><br/>
            				<div class="btn-group">
            				 <a class="defaultBtn btn-large add_to_cart_main" data-id="{{ $rows_compair['product_pk_id'] }}" 
                     data-price="{{ $rows_compair['product_price'] }}" title="Thêm vào giỏ hàng" href="javascript:void(0)"><span class=" icon-shopping-cart"></span> Thêm vào giỏ hàng</a>
            				 <a href="{{ url('product_details/'.$rows_compair['product_pk_id']) }}" class="shopBtn btn-large">Xem</a>
            				 </div>
            				</form>
            				</td>
            				@endforeach
                </tr>
                <tr class="compair_tr_2">
                  <td>Số Lượng</td>
                  @foreach(Session::get('compair') as $rows_compair)
                  <td class="compair_td" data-id="{{ $rows_compair['product_pk_id'] }}">{{ $rows_compair['product_stock'] }}</td>
                  @endforeach
                </tr>
                <tr class="compair_tr_3">
                  <td>Kiểu Dáng</td>
                  @foreach(Session::get('compair') as $rows_compair)
                  <td class="compair_td" data-id="{{ $rows_compair['product_pk_id'] }}">{{ $rows_compair['product_style'] }}</td>
                  @endforeach
                </tr>
				        <tr class="compair_tr_4">
                  <td>Mùa</td>
                  @foreach(Session::get('compair') as $rows_compair)
                  <td class="compair_td" data-id="{{ $rows_compair['product_pk_id'] }}">{{ $rows_compair['product_season'] }}</td>
                  @endforeach
                </tr>
				        <tr class="compair_tr_5">
                  <td>Thích hợp sử dụng</td>
                  @foreach(Session::get('compair') as $rows_compair)
                  <td class="compair_td" data-id="{{ $rows_compair['product_pk_id'] }}" dir="">{{ $rows_compair['product_usage'] }}</td>
                  @endforeach
                </tr>
				        <tr class="compair_tr_6">
                  <td>Thể Thao</td>
                  @foreach(Session::get('compair') as $rows_compair)
                  <td class="compair_td" data-id="{{ $rows_compair['product_pk_id'] }}">{{ $rows_compair['product_sport'] }}</td>
                  @endforeach
                </tr>
                <tr class="compair_tr_7">
                  <td>Hãng Sản Xuất</td>
                  @foreach(Session::get('compair') as $rows_compair)
                  <td class="compair_td" data-id="{{ $rows_compair['product_pk_id'] }}">{{ $rows_compair['product_brand'] }}</td>
                  @endforeach
                </tr>
           
              	
            </table>	
          </div>
  <div class="alignR" style="float:left;"><a href="{{ url('/') }}" class="shopBtn btn-large">Quay Trở Về Trang Chủ</a></div>
	<div class="alignR"><a href="{{ url('ajax_remove_all_compair') }}" class="shopBtn btn-large">Xóa Toàn Bộ</a></div>
    </div>
    <h1 style="text-align: center; display: none;" class="dont_have_compair">
      
        <small>Bạn chưa chọn món hàng nào để so sánh <br> hãy quay về <a href="{{ url('/') }}">trang chủ</a> để chọn món hàng đầu tiên nào :D </small>
    </h1>
  @else
  <h1 style="text-align: center" class="dont_have_compair">
      
        <small>Bạn chưa chọn món hàng nào để so sánh <br> hãy quay về <a href="{{ url('/') }}">trang chủ</a> để chọn món hàng đầu tiên nào :D </small>
  </h1>
  @endif

	
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
      function ajax_remove(key)
      {
        $.ajax({
          url:'{{ url('remove_one_compair_ajax') }}',
          method:'GET',
          cache: false,
          data:{
            key:key
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