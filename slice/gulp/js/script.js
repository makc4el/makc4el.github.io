 function Travel(){
 	this.coontinentsArr = [];
 	this.OutputString = '' ;
 	var StorageCoord;
 	this.init = function(){
 		this.SelectricInit();
 		this.OpenMenu();
 		this.CloseMenu();
 		this.mapChoose();
 		this.goToCountr();
 		this.openSearch();
 	}
 	this.goToCountr = function(){
 		var self = this;
 		$('.coontinents_btn').click(function(e){
 			e.preventDefault();
 			self.getSelectContinents();
			localStorage.setItem('coontinents', self.coontinentsArr);
			window.location.href = "map-country.html";
 		});
 	}
 	this.getSelectContinents = function() {
 		var self = this;
 		self.OutputString = '';
		self.coontinentsArr = [];
		$('img.active').each(function(key, value){
			self.coontinentsArr.push($(value).data('continent'));
			localStorage.setItem('coord',$(value).data('coord'));
		});
		for(var i = 0; i < self.coontinentsArr.length; i++){
			if(i > 0){
				self.OutputString += " / " + self.coontinentsArr[i];
				console.log(self.OutputString );
			}
			else{
				self.OutputString = self.coontinentsArr[i];
			}
		}
		$('.choose_coontinents p').eq(0).text(self.OutputString);
		// console.log(self.coontinentsArr);

 	}
 	this.openSearch = function(){
 		var self = this;
 		$('.search-box').click(function(){
 			$('#header > .container').slideToggle();
 		});
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
 	this.mapChoose = function() {
 		var self = this;
 		$('.map-content img').click(function(){
 			console.log(this);
 			$(this).toggleClass('active');
 			$(this).next('span').toggleClass('active');
 			self.getSelectContinents();
 		});
 		$('.map-content span').click(function(){
 			console.log(this);
 			$(this).toggleClass('active');
 			$(this).prev('img').toggleClass('active');
 			self.getSelectContinents();
 		});
 	}
 	this.init();
 }
// .choose_coontinents
var Travel1 = false;
$(document).ready(function(){
	Travel1 = new Travel();
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
