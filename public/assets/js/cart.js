$(document).ready(function() {
		$('.qty_down').click(function(){
			rowId = $(this).attr('data-id'); //attr để lấy thuộc tính bên trong data-id=" "
			qty_product = $(this).parent().parent().find('.qty_product').val();
			//parent để lấy hàm cha của cái đang xét , find để tìm class có trong cái đang xét
			qty_product = parseInt(qty_product); 
			//parseInt : phải dùng nó ở trong + , còn ở - thì không cần thiết , vì trong js , val() trả về string , phải ép kiểu về int
			product_price = $(this).attr('data-price');
			//xài thẻ span sẽ k bị thay đổi mà vẫn lấy được class.. như mong muốn
			cart_count = $(this).parents().find('.cart_count').text();
			//input thì đc xài val() , còn không phải input thì xài text() hoặc gán value cho thẻ đó xong gọi bằng attr('value')
			if(qty_product > 1)
			{
				qty_product -= 1;
				change_qty_total_subtotal($(this));
				// muốn number format trong jquery thì copy thư mục jquery.number.min.js này vào public/assets/js/jquery.number.min.js
				// xong gọi tới ở dưới cùng
				// https://github.com/customd/jquery-number/blob/master/jquery.number.min.js
				cart_count -=1;
				change_count_totalheader($(this));
				ajax_update(rowId,qty_product);
			}
			else
			{
				update_when_minus_to_0($(this));
				ajax_remove(rowId);
				if($('.count_cart_td').length==0)
				{
					$('.have_cart').css('display','none');
					$('.dont_have_cart').css('display','block');
					ajax_remove_all_cart();
				}
			}
		});
		$('.qty_up').click(function(){
			rowId = $(this).attr('data-id'); //attr để lấy thuộc tính bên trong data-id=" "
			qty_product = $(this).parent().parent().find('.qty_product').val();
			//parent để lấy hàm cha của cái đang xét , find để tìm class có trong cái đang xét
			qty_product = parseInt(qty_product); 
			//parseInt : phải dùng nó ở trong + , còn ở - thì không cần thiết , vì trong js , val() trả về string , phải ép kiểu về int
			product_price = $(this).attr('data-price');
			//xài thẻ span sẽ k bị thay đổi mà vẫn lấy được class.. như mong muốn
			cart_count = $(this).parents().find('.cart_count').text();
			cart_count = parseInt(cart_count);
			max = $(this).attr('max');
			//input thì đc xài val() , còn không phải input thì xài text() hoặc gán value cho thẻ đó xong gọi bằng attr('value')
			if(qty_product != 0 && qty_product < max)
			{
				qty_product += 1;
				change_qty_total_subtotal($(this));
				// muốn number format trong jquery thì copy thư mục jquery.number.min.js này vào public/assets/js/jquery.number.min.js
				// xong gọi tới ở dưới cùng
				// https://github.com/customd/jquery-number/blob/master/jquery.number.min.js
				cart_count +=1;
				change_count_totalheader($(this));
				ajax_update(rowId,qty_product);
			}

		});
		$('.qty_product').change(function(){

			rowId = $(this).attr('data-id'); //attr để lấy thuộc tính bên trong data-id=" "
			qty_product = $(this).val();
			//parent để lấy hàm cha của cái đang xét , find để tìm class có trong cái đang xét
			qty_product = parseInt(qty_product); 
			//parseInt : phải dùng nó ở trong + , còn ở - thì không cần thiết , vì trong js , val() trả về string , phải ép kiểu về int
			product_price = $(this).attr('data-price');
			//xài thẻ span sẽ k bị thay đổi mà vẫn lấy được class.. như mong muốn
			cart_count = $(this).parents().find('.cart_count').text();
			cart_count = parseInt(cart_count); 
			//input thì đc xài val() , còn không phải input thì xài text() hoặc gán value cho thẻ đó xong gọi bằng attr('value')
			stock = $(this).attr('max');
			if(qty_product > stock)
			{
				qty_product=stock;
				$(this).val(qty_product);
				change_when_qty_input_text_change($(this));
			}
			else if(qty_product < 0)
			{
				qty_product=0;
				$(this).val(qty_product);
				change_when_qty_input_text_change($(this));
			}
			else
			{
				change_when_qty_input_text_change($(this));
			}
		});
		$('#product_details_qty').change(function(){
			qty = parseInt($(this).val());
			max = parseInt($(this).attr('max'));
			//lấy số lượng đối đa có thể insert vào cart làm max
			//nếu thay đổi qty > max thì sẽ chỉnh lại về max
			console.log(max);
			// console.log(qty);
			if(qty > max)
			{
				$(this).val(max);
			}
			//nếu thay đổi qty là số âm thì sẽ chỉnh lại về thành 0 hoặc 1
			else if(qty < 1)
			{
				//nếu insert toàn bộ qty của sản phẩm đó vào cart thì max sẽ = 0
				//ví dụ sản phẩm đó có qty trong database là 28 , insert cả 28 sản phẩm vào cart thì max = 28 - 28 = 0
				if(max == 0)
				{
					$(this).val(0);
				}
				else
				{
					$(this).val(1);
				}
			}
			

		});
		$('.delete_cart').click(function(){
			rowId = $(this).attr('data-id');
			// cart_count=0;
			// $(this).parents().find('.qty_product').each(function(){
			// 	cart_count += parseInt($(this).val());
			// });
			qty_product = $(this).parent().parent().find('.qty_product').val();
			cart_count = $(this).parents().find('.cart_count').text();
			cart_count = cart_count - qty_product;
			$(this).parents().find('.cart_count').text(cart_count);
			$(this).parents().find('.cart_count_header').text(cart_count);
			$(this).parents().find('.cart_count_header_n2').text(cart_count);
			$(this).parent().parent().parent().parent().parent().find('.thead_cart').remove();
			$(this).parent().parent().parent().parent().parent().find('.tbody_cart').remove();
			cart_total_header = parseInt($('.cart_total_header').attr('val'));
			cart_total = $(this).parents().find('.cart_total').attr('value');
			cart_total_header -= parseInt(cart_total);
			$('.cart_total_header').text($.number(cart_total_header, 0, '.', ','));
			ajax_remove(rowId);
			if($('.count_cart_td').length==0)
			{
				$('.have_cart').css('display','none');
				$('.dont_have_cart').css('display','block');
				ajax_remove_all_cart();
			}
			
		});
		$('.add_to_cart_main').click(function(){
		 		id = $(this).attr('data-id');
		 		count = $(this).parents().find('.cart_count_header').text();
		 		count = parseInt(count);
		 		count += 1;
		 		$(this).parents().find('.cart_count_header').text(count);
		 		price = parseInt($(this).attr('data-price'));
		 		total =  parseInt($(this).parents().find('.cart_total_header').text().replace(/,/gi,''));
		 		total += price + price * 10/100;
		 		$(this).parents().find('.cart_total_header').text($.number(total, 0, '.', ','));
		 		ajax_add(id);
		 });
		//submit form phải có  e.preventDefault(); và cấu trúc như bên dưới
		$('.add_to_cart_product_detail').on('submit',function(e){
				e.preventDefault();
		 		id = $(this).attr('data-id');
		 		qty = parseInt($('.qty').val());
		 		color = $('.att_color').val();
		 		material = $('.att_material').val();
		 		count = $(this).parents().find('.cart_count_header').text();
		 		count = parseInt(count);
		 		count += qty;
		 		$(this).parents().find('.cart_count_header').text(count);
		 		price = parseInt($(this).attr('data-price'));
		 		total =  parseInt($(this).parents().find('.cart_total_header').text().replace(/,/gi,''));
		 		total += price * qty + price * qty * 10/100;
		 		$(this).parents().find('.cart_total_header').text($.number(total, 0, '.', ','));
		 		qty_product = $('#product_details_qty').val();
		 		max = $('#product_details_qty').attr('max');
		 		max -= qty_product;
		 		$('#product_details_qty').attr('max',max);
		 		ajax_add_product_detail(id,qty,color,material);

		 });
		$('#country').change(function(e){
				optionSelected = $(this).find("option:selected");
				price = optionSelected.attr('data-price');
				if(price == 'free')
				{
					$('.ship_result').text('Dịch vụ trong nội thành được miễn phí ^_^');
				}
				else if(isNaN(price))
				{
					$('.ship_result').text('Bạn chưa chọn thành phố :<');
				}
				else
				{
					$('.ship_result').text('Số tiền bạn phải trả cho dịch vụ là '+($.number(price, 0, '.', ','))+' VNĐ');
				}
				$('.ship_result').css('display','block');
				
		});
		$('#city').change(function(e){
				optionSelected = $(this).find("option:selected");
				city = optionSelected.attr('value');
				ajax_county(city);
		});
		// tự viết jquery validate cho select name="city"
		$.validator.addMethod("valueNotEquals", function(value, element, arg){
		  return arg !== value;
		 }, "Value must not equal arg.");

 		$('#input_info').validate({
 			rules : {
					place : {
						required : true
					},
					mobile_number : {
						required : true,
						digits : true,
						minlength : 11,
						maxlength : 11
					},
					//gọi ở đây
					city: {
						valueNotEquals: "0"
					},
					county: {
						valueNotEquals: "0"
					}
				},
				messages : {
					place : {
						required : "Vui lòng nhập nơi nhận hàng"
					},
					mobile_number : {
						required : "Vui lòng nhập số điện thoại liên hệ",
						digits : "Bạn chưa nhập đúng định dạng số điện thoại",
						minlength : "Số điện thoại có chính xác 11 số",
						maxlength : "Số điện thoại có chính xác 11 số"
					},
					city: {
						valueNotEquals: "Bạn chưa chọn tỉnh/thành phố"
					},
					county: {
						valueNotEquals: "Bạn chưa chọn quận/huyện"
					}
				},
 			 	submitHandler: function(form) {
 			 		place = $('#place').val();
 					mobile_number = $('#mobile_number').val();
 					cityOptionSelected = $('#city').find("option:selected");
					city = cityOptionSelected.attr('value');
					countyOptionSelected = $('#county').find("option:selected");
					county = countyOptionSelected.attr('value');
			 		$('.input_info_success').text('Xác nhận thông tin thành công :D');
			 		$('.input_info_success').css('display','block');
			 		ajax_input_info(place,mobile_number,city,county);
		 		}
 		});
		$('#input_voucher').validate({
 			rules : {
					voucher_code : {
						required : true,
						minlength : 8,
						maxlength : 8
					}
				},
				messages : {
					voucher_code : {
						required : "Vui lòng nhập mã voucher",
						minlength : "Bạn cần nhập chính xác 8 số",
						maxlength : "Bạn cần nhập chính xác 8 số"
					}
				},
 			 	submitHandler: function(form) {
 			 		voucher = $('#voucher').val();
			 		ajax_input_voucher(voucher);
		 		}
 		}); 		
		function change_when_qty_input_text_change(target)
		{
			if(qty_product >=1)
				{
					cart_subtotal = (product_price*qty_product);
					target.parent().parent().find('.cart_subtotal').text($.number(cart_subtotal, 0, '.', ',') + " VNĐ");
					cart_total = (product_price*qty_product) + (product_price*qty_product) * 10/100;
					cart_total = target.parents().find('.cart_total').text($.number(cart_total, 0, '.', ','));
					// muốn number format trong jquery thì copy thư mục jquery.number.min.js này vào public/assets/js/jquery.number.min.js
					// xong gọi tới ở dưới cùng
					// https://github.com/customd/jquery-number/blob/master/jquery.number.min.js
					cart_count=0;
					$('.qty_product').each(function(){
							// each không thể sử dụng $(this) , phải gọi tên class $('.qty_product')
							cart_count += parseInt($(this).val());
							//http://vietjack.com/javascript/string_replace_trong_javascript.jsp
					});
					change_count_totalheader(target);
					ajax_update(rowId,qty_product);
				}
			if(qty_product == 0)
				{
					cart_count=0;
					$('.qty_product').each(function(){
							// each không thể sử dụng $(this) , phải gọi tên class $('.qty_product')
							cart_count += parseInt($(this).val());
							//http://vietjack.com/javascript/string_replace_trong_javascript.jsp
					});
					target.parents().find('.cart_count').text(cart_count);
					target.parents().find('.cart_count_header').text(cart_count);
					target.parents().find('.cart_count_header_n2').text(cart_count);
					target.parent().parent().parent().parent().find('.thead_cart').remove();
					target.parent().parent().parent().parent().find('.tbody_cart').remove();
					cart_total_header = parseInt($('.cart_total_header').text().replace(/,/gi,''));
					cart_total = target.parents().find('.cart_total').text().replace(/,/gi,'');
					cart_total_header -= parseInt(cart_total);
					$('.cart_total_header').text($.number(cart_total_header, 0, '.', ','));
					ajax_remove(rowId);
					if($('.count_cart_td').length==0)
					{
						$('.have_cart').css('display','none');
						$('.dont_have_cart').css('display','block');
						ajax_remove_all_cart();
					}
				}
		}
		function change_qty_total_subtotal(target)
		{
			target.parent().parent().find('.qty_product').val(qty_product);
			cart_subtotal = (product_price*qty_product);
			target.parent().parent().parent().find('.cart_subtotal').text($.number(cart_subtotal, 0, '.', ',') + " VNĐ");
			cart_total = (product_price*qty_product) + (product_price*qty_product) * 10/100;
			cart_total = target.parent().parent().parent().parent().find('.cart_total').text($.number(cart_total, 0, '.', ','));
		}
		function change_count_totalheader(target)
		{
			target.parents().find('.cart_count').text(cart_count);
			target.parents().find('.cart_count_header').text(cart_count);
			target.parents().find('.cart_count_header_n2').text(cart_count);
			cart_total_header = 0;
			target.parents().find('.cart_total').each(function(){
					cart_total_header += parseInt($(this).text().replace(/,/gi,''));
					//http://vietjack.com/javascript/string_replace_trong_javascript.jsp
			});
			target.parents().find('.cart_total_header').text($.number(cart_total_header, 0, '.', ','));
		}
		function update_when_minus_to_0(target)
		{
			cart_count -=1;
			target.parents().find('.cart_count').text(cart_count);
			target.parents().find('.cart_count_header').text(cart_count);
			target.parents().find('.cart_count_header_n2').text(cart_count);
			target.parent().parent().parent().parent().parent().find('.thead_cart').remove();
			target.parent().parent().parent().parent().parent().find('.tbody_cart').remove();
			cart_total_header = parseInt($('.cart_total_header').text().replace(/,/gi,''));
			cart_total = target.parents().find('.cart_total').text().replace(/,/gi,'');
			cart_total_header -= parseInt(cart_total);
			$('.cart_total_header').text($.number(cart_total_header, 0, '.', ','));
		}

		
	});