var Marker,
    map,
    markerCounter = 0,
    flightPlanCoordinates = [],
    myPos = {lat: -34.397, lng: 150.644},
    markeArr = [],
    LinePathArr = [],
    service,
    geocoder,
    CityName = [],
    infowindow,
    nameCounter = 0,
    name, 
    geocoder,
    city;
var Valid = true;
var CountrList = [];
initMap = function(){ 
        map = new google.maps.Map(document.getElementById('map'), {
        center: myPos,
        zoom: 4,
        styles: []
    });
}       
initMarker = function(lat,lng){
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[1]) {
        Valid = true;
        for(i = 0;i < results[0].address_components.length;i++){
            if(results[0].address_components[i]['types'][0] == 'locality'){
                console.log(results[0].address_components[i]['long_name']);
                name =  results[0].address_components[i]['long_name'];
                CountrList.push(name);

        //city data




    // sendRequestName(lat,lng);
    var coordinates = {lat: lat, lng: lng};
    var iconUrld = 'images/marker.png';
        Marker = new google.maps.Marker({
        position: coordinates,
        draggable : true,
        shadowStyle: 1,
        padding: 0,
        backgroundColor: 'rgb(57,57,57)',
        borderRadius: 5,
        arrowSize: 10,
        borderWidth: 1,
        borderColor: '#2c2c2c',
        disableAutoPan: true,
        hideCloseButton: true,
        arrowPosition: 30,
        backgroundClassName: 'transparent',
        arrowStyle: 2,
        map: map,
        icon: iconUrld
    });
    var InfoContent = '<div class="MyInfo">'+name+'</div>'
    markeArr.push(Marker);
      infowindow = new google.maps.InfoWindow({
      content: InfoContent,
    });
    infowindow.open(map, Marker);

    google.maps.event.addListener(Marker, 'dragend', function(e) {
        var MarkerLat,
            MarkerLng;
        flightPathClean();
        for(var i = 0;i<markeArr.length;i++){
            MarkerLat = markeArr[i]['position'].lat();
            MarkerLng = markeArr[i]['position'].lng();
            flightPath(MarkerLat,MarkerLng);
        }
    });
            } else {
          Valid = false; 
        }
      } else {
        Valid = false;
      }
        if (Valid){
        flightPath(lat,lng);
        }
                    }
            else{
                // return 0;
            }
        }
    });
}
MapClick = function(){
    var lat,
        lang;
    google.maps.event.addListener(map, "click", function(event) {
        lat = event.latLng.lat();
        lng = event.latLng.lng();
        chengeMarkerCoordinate(lat,lng);
    });
}
chengeMarkerCoordinate = function(lat,lng){
        initMarker(lat,lng);

}
flightPathClean = function(){
    flightPlanCoordinates = [];
    for(var i = 0;i <LinePathArr.length;i++){
        LinePathArr[i].setMap(null);
    }
}
flightPath = function(PathLat,PathLng){
        element = {};
        element.lat = PathLat;
        element.lng = PathLng;
        flightPlanCoordinates.push(element);
        if(markeArr.length > 0){
            LinePath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: '#fff ',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });
            LinePathArr.push(LinePath);
            LinePath.setMap(map);
        }
}
function initialize() {
    geocoder = new google.maps.Geocoder();
  }

TaskManager = function(){
    initMap();
    MapClick();
    initialize();
}
$(document).ready(function(){
    TaskManager();
    setInterval(function(){
        $('.gm-style-iw').prev().hide();
    },50);
});