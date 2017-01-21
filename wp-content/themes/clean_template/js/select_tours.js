jQuery(function($){

  var select = $('#city_and_tour');
  select.change(function () {

    $( "select[id='city_and_tour']  option:selected" ).each(function() {
      var city = $(this).val();
      var location = $(this).text();

      if(city!=='not'){
        
        var data = {
          'action': 'selectcity',
          'city' : city
        };

        // beforeSend — срабатывает перед отправкой запроса
        // error — если произошла ошибка
        // success — если ошибок не возникло
        // complete — срабатывает по окончанию запроса
        $.ajax({
          url:ajaxurl, // обработчик
          data:data, // данные
          type:'POST', // тип запроса
          beforeSend:function (data) {
            // $('#submit_registration a').text('Loading');
          },
          complete:function (data) {
            // $('#submit_registration a').text('CONTINUE');
          },
          success:function(data){
            localStorage.clear();
            var tours= JSON.parse(data);
            var redirect_to=tours[0];
            tours.shift();
            localStorage.setItem("tours_id", JSON.stringify(tours));
            localStorage.setItem("locations", location);
            window.location = redirect_to;

          }
        });




      }

    });

  });

});