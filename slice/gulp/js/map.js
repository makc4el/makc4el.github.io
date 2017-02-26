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
      console.log(results[0]['formatted_address'].split(',')[results[0]['formatted_address'].split(',').length-1])
        if (results[1]) {
         //formatted address
         name = results[0].formatted_address;
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //city data
        name = city.short_name + " " + city.long_name;





    // sendRequestName(lat,lng);
    var coordinates = {lat: lat, lng: lng};
    var iconUrld = 'images/marker.png';
        Marker = new google.maps.Marker({
        position: coordinates,
        draggable : true,
        // animation: google.maps.Animation.BOUNCE,
        map: map,
        icon: iconUrld
    });
    markeArr.push(Marker);
      infowindow = new google.maps.InfoWindow({
      content: name,
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
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
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
        flightPath(lat,lng);
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
        if(markeArr.length > 1){
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
});