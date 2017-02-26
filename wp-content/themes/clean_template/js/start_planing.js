
var select_location = localStorage.getItem('CityName');
var title_tour = localStorage.getItem('title_tour');
$('#locations').val(select_location);

var data = {
  'action': 'start_planing',
  'select_locations' : select_location,
  'title_tour' : title_tour
};

$.ajax({
  url:ajaxurl, // обработчик
  data:data, // данные
  type:'POST', // тип запроса
  success:function(data){

    var container = $('#tours');
    var r= JSON.parse(data);

    $('#title_tour').text(r.title_tour);
    $('#description1').text(r.description_1);
    $('#description2').text(r.description_2 );
    $('#title_top_highlights').text(r.title_top_highlights );
    $('#title_before_description_2').text(r.title_before_description_2 );


    console.log(r.title_top_highlights);
    for(var i=0; i<r.top_highlights2.length; i++){
      var desc = r.top_highlights2[i].description;
      var icon = r.top_highlights2[i].icon;
      $('#top_highlights').append('<li class="package_block-item-info_item item-info-museum"><span class="package_block-item-info-item-text">'+desc+'</span></li>');
    }

    for(i=0; i<r.tour_images.length; i++){
      var image = r.tour_images[i].image;
      $('#images_tour').append('<div class="package_block-item-img" style="background: url('+image+') no-repeat center;background-size: cover;"></div>');
    }
    // window.location = redirect_to;
  }
});

