$('.add_to_compair_main').click(function(){
	var ischecked = $(this).hasClass('added');
	if(!ischecked)
 	{
		id = $(this).attr('data-id');
		$(this).addClass('added');
 		count = $(this).parents().find('.compair_count_header').text();
 		count = parseInt(count);
 		count += 1;
 		$(this).parents().find('.compair_count_header').text(count);
 		ajax_add_compair(id);
 	}
});
$('.add_to_compair_checked').click(function(){
	var ischecked = $(this).hasClass('added');
	if(!ischecked)
	{
			id = $(this).attr('data-id');
			$(this).addClass('added');
	 		count = $(this).parents().find('.compair_count_header').text();
	 		count = parseInt(count);
	 		count += 1;
	 		$(this).parents().find('.compair_count_header').text(count);
	 		ajax_add_compair(id);
 		}
 		else if(ischecked)
 		{
 			id = $(this).data('id');
			count = $('.compair_count_header').text();
			count--;
			$(this).removeClass('added');
			$('.compair_count_header').text(count);
			ajax_remove_by_checked(id);
			if(count==0)
			{
				ajax_remove_all_compair();
			}
			
 		}
	});
$('.remove_one_compair_ajax').click(function(){
			key = $(this).attr('data-key');
			id = $(this).data('id');
			$('.compair_td[data-id="'+id+'"]').remove();
			$(this).closest('.th_compair_1').remove();
			count = $('.count_compair').text();
			count--;
			$('.count_compair').text(count);
			$('.compair_count_header').text(count);
			ajax_remove(key);
			if($('.compair_td').length==0)
			{
				$('.have_compair').css('display','none');
				$('.dont_have_compair').css('display','block');
				ajax_remove_all_compair();
			}
		});