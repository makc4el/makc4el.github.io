$(document).ready(function(){

	$('.all_message-item-parent').click(function(){
		$(this).toggleClass('all_message-min-active');
		$(this).find('input').prop('checked',!$(this).find('input').prop('checked'));
		checkControlsBtn()
	})


	$('.header-controls_item-check-container').click(function(){

		if( !$(this).find('input').prop('checked') ){
			$('.all_message-item-parent').addClass('all_message-min-active');
			$('.all_message-min-check').prop('checked',true);
			$(this).find('input').prop('checked',true);
		} else {
			$('.all_message-item-parent').removeClass('all_message-min-active');
			$('.all_message-min-check').prop('checked',false);
			$(this).find('input').prop('checked',false);		
		}

	});


	function checkControlsBtn(){
		if( $(".all_message-item-parent input:checked").length == $(".all_message-item-parent input").length){
			$('.header-controls_item-check-container input').prop('checked',true);
		} else {
			$('.header-controls_item-check-container input').prop('checked',false);
		}
	}


	$('.left_bar-all_item').click(function(){
		$(this).toggleClass('left_bar-all_item-parent-open');
	});
	
		
 	$( ".header-controls_search select" ).selectric({
 		arrowButtonMarkup: '<span class="left-bar-btn" ><img clas="header-serach-icon" src="images/chevron---down.png"></span>' 		
 	});
 	$('.all_message-item-parent_include').click(function(){
 		$(this).toggleClass('all_message-item-parent_open');
 	})
 	$('.burger-img').click(function(){
 		$('.left_bar-all_list').addClass('left_bar-all_list-active');
 		$('.corss-img').fadeIn();
 		$('.heder_login-info').show();
 		$('#header').css('position','static');
 		$('#header').css('z-index','auto');
 	});
 	 $('.corss-img').click(function(){
 	 	$('.corss-img').fadeOut();
 		$('.left_bar-all_list').removeClass('left_bar-all_list-active');
 		$('.heder_login-info').hide();
 		$('#header').css('position','fixed');
 		 		$('#header').css('z-index','3');
 	});

})
