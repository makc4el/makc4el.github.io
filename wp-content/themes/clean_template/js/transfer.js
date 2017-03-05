$('.transfer_title').text(localStorage.getItem('title_tour'));
$('#countries').val(localStorage.getItem('CityName'));
var title_tour = localStorage.getItem('title_tour');

var data = {
  'action': 'transfer',
  'title_tour' : title_tour

};

$.ajax({
  url:ajaxurl, // обработчик
  data:data, // данные
  type:'POST', // тип запроса
  success:function(data){

    console.log(data);

    // var r= JSON.parse(data);
    // console.log(r);
    // $('#before_html').after(r.tours_html);

    // localStorage.setItem('tour_price', r.tour_price);
    // localStorage.setItem('price_per_person', r.price_per_person);
    // localStorage.setItem('count_days', r.count_days);

    

    // $('#title_tour').text(r.title_tour);


    // console.log(r.title_top_highlights);
    // for(var i=0; i<r.top_highlights2.length; i++){
    //   var desc = r.top_highlights2[i].description;
    //   var icon = r.top_highlights2[i].icon;
    //   $('#top_highlights').append('<li class="package_block-item-info_item item-info-museum"><span class="package_block-item-info-item-text">'+desc+'</span></li>');
    // }
    //
    // for(i=0; i<r.tour_images.length; i++){
    //   var image = r.tour_images[i].image;
    //   $('#images_tour').append('<div class="package_block-item-img" style="background: url('+image+') no-repeat center;background-size: cover;"></div>');
    // }
    // window.location = redirect_to;
  }
});