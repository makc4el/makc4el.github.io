function Travel(){this.init=function(){this.SelectricInit()},this.SelectricInit=function(){},this.init()}$(document).ready(function(){new Travel;$("select").selectric({nativeOnMobile:!1,arrowButtonMarkup:'<span class="left-bar-btn" ><img clas="header-serach-icon" src="images/icons/arr.svg"/></span>'}),$("#datepicker").datepicker(),$("#spinner1").spinner(),$("#spinner2").spinner(),$("#slider").slider({range:"min",value:2,min:0,max:4,step:1}),$(".cart-img-list").owlCarousel({loop:!0,items:1,nav:!0,navText:["",""]})});
var select_ocation = localStorage.getItem('locations');
var tours_id = localStorage.getItem('tours_id');
if(select_ocation && tours_id){
  $('#locations').val(select_ocation);
  tours_id = JSON.parse(localStorage.getItem("tours_id"));

  var data = {
    'action': 'show_tours',
    'tours_id' : tours_id
  };

  $.ajax({
    url:ajaxurl, // обработчик
    data:data, // данные
    type:'POST', // тип запроса
    success:function(data){
      
      var container = $('#tours');
      container.append(data);
      // var r= JSON.parse(data);
      // localStorage.setItem("tours_id", JSON.stringify(tours));
      // window.location = redirect_to;
    }
  });

  // show SHARE LINK
  $("#share_package").click(function (e) {
    e.preventDefault();

    var share_links = $("#share_package").siblings();
    share_links.each(function () {
      $( this ).toggle();
    });
  });





}


