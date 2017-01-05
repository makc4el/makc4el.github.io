 function Travel(){
 	this.init = function(){
 		this.SelectricInit();
 	}

 	this.SelectricInit = function(){
 		var self = this;
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
})
