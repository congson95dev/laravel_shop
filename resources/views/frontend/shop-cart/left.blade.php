			<div id="sidebar" class="span3">
			<div class="well well-small">

				<ul class="nav nav-list">
				<!-- Category -->
					<?php 
						$category = DB::select("select * from shop_category");
						foreach ($category as $rows)
						  {
					?>
					<li><a href="{{ url('category_detail/'.$rows->category_pk_id) }}"><span class="icon-chevron-right"></span>{{ $rows->category_name }}</a></li>
					<?php } ?>
				<!-- End Category -->
					<li style="border:0"> &nbsp;</li>
					<li> <a class="totalInCart" href="cart.html"><strong>Tổng tiền   <span class="badge badge-warning pull-right" style="line-height:18px;">
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
								echo " VNĐ";
						?>
					</span></strong></a></li>
				</ul>
			</div>

			  <div class="well well-small alert alert-warning cntr">
				  <h2>50% Discount</h2>
				  <p> 
					 only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
				  </p>
			  </div>
			  <div class="well well-small" ><a href="#"><img src="{{ asset('assets/img/paypal.jpg') }}" alt="payment method paypal"></a></div>
			
			<a class="shopBtn btn-block" href="{{ url('comming_products') }}">Sản phẩm sắp ra mắt <br><small> Xem thông tin</small></a>
			<br>
			<br>
			<ul class="nav nav-list promowrapper">
				<?php 
					$n=0;
					$arr_comming_products_2=DB::select("select * from shop_products where product_comming='1' order by product_pk_id desc limit 3");
					
						foreach($arr_comming_products_2 as $rows_comming_products_2)
						{
							if($n<3)
							{
				?>	
			<li>
			  <div class="thumbnail">
				<a class="zoomTool" href="{{ url('comming_product_details/'.$rows_comming_products_2->product_pk_id) }}" title="Xem thông tin"><span class="icon-search"></span> Xem thông tin</a>
				<img src="{{ asset('assets/img/product/'.$rows_comming_products_2->product_img) }}" alt="bootstrap ecommerce templates">
				<div class="caption">
				  <h4><a class="defaultBtn" href="{{ url('comming_product_details/'.$rows_comming_products_2->product_pk_id) }}">Xem</a> <span class="pull-right">{{ number_format($rows_comming_products_2->product_price) }} VNĐ</span></h4>
				</div>
			  </div>
			</li>
			<li style="border:0"> &nbsp;</li>
			<?php $n++; } } ?>
		  </ul>

	</div>