function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: uluru
    });
    var marker = new google.maps.Marker({
      // position: uluru,
      map: map
    });
}
function map(){
    this.init = function(){
        this.initMap();
    }
    this.initMap = function(){

    }
}
$(document).ready(function(){
    var map1 = new map();
    map1.init();


});