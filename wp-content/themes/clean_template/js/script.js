function Travel(){
  this.coontinentsArr = [];
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
    $('.choose_btn').click(function(e){
      e.preventDefault();
      self.coontinentsArr = [];
      $('img.active').each(function(key, value){
        self.coontinentsArr.push($(value).data('continent'));
      });
      localStorage.setItem('coontinents', self.coontinentsArr);
      localStorage.setItem('CityName', CityName);




      window.location.href = page_available_tours;
    });
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
    });
    $('.map-content span').click(function(){
      console.log(this);
      $(this).toggleClass('active');
      $(this).prev('img').toggleClass('active');
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











//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  // show SHARE LINK
  $("#share_package").click(function (e) {
    e.preventDefault();
    
    var share_links = $("#share_package").siblings();
    share_links.each(function () {
      $( this ).toggle();
    });
  });





