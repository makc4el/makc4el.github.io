
var select_location = localStorage.getItem('CityName');
var id_tour = localStorage.getItem('id_tour');
$('#locations').val(select_location);

var data = {
  'action': 'start_planing',
  'select_locations' : select_location,
  'id_tour' : id_tour
};

$.ajax({
  url:ajaxurl, // обработчик
  data:data, // данные
  type:'POST', // тип запроса
  success:function(data){
console.log(data);
    var container = $('#tours');
    // var r= JSON.parse(data);

    // window.location = redirect_to;
  }
});

