 function Travel(){
 	this.init = function(){
 		this.SelectricInit();
 		this.OpenMenu();
 		this.CloseMenu();
 	}

 	this.SelectricInit = function(){
 		var self = this;
 	}
 	this.OpenMenu = function(){
 		var self = this;
 		$('.open-menu').click(function(){
 			$('.min-menu').slideDown();
 		});
 	}
 	this.CloseMenu = function(){
 		var self = this;
 		$('.cancel-menu').click(function(){
 			$('.min-menu').slideUp();
 		});
 	}
 	this.init();
 }


$(document).ready(function(){
	var Travel1 = new Travel();
 	$('select').selectric({
 		nativeOnMobile: false,
 		arrowButtonMarkup: '<span class="left-bar-btn" ><img clas="header-serach-icon" src="images/icons/arr.svg"/></span>' 		
 	});
 	$( "#datepicker" ).datepicker();
 	$( "#spinner1" ).spinner();
 	$( "#spinner2" ).spinner();
 	$( "#slider" ).slider({
		range: 'min', 
		value:2,
		min: 0,
		max: 4,
		step: 1
  });
 	$('.cart-img-list').owlCarousel({
		loop:true,
		items:1,
		nav:true,
		navText: ["",""]
})
})
