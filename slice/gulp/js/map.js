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
    nameCounter = 0;
initMap = function(){
        map = new google.maps.Map(document.getElementById('map'), {
        center: myPos,
        zoom: 2,
        styles: [
          {elementType: 'geometry', stylers: [{color: '#6659a3'}]},
          {elementType: 'labels.text.stroke', stylers: [{color: '#6659a3'}]},
          {elementType: 'labels.text.fill', stylers: [{color: '#ffffff'}]},
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#fff'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#fff'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry.stroke',
            stylers: [{color: 'transparent'}]
          },
          {
            featureType: 'road',
            elementType: 'labels.text.fill',
            stylers: [{color: '#fff'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: 'transparent'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: 'transparent'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [{color: '#fff'}]
          },
          {
            featureType: 'transit',
            elementType: 'geometry',
            stylers: [{color: '#2f3948'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'labels.text.fill',
            stylers: [{color: '#282560'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [{color: '#282560'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#282560'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#282560'}]
          }]
    });
}
initMarker = function(lat,lng){
    // sendRequestName(lat,lng);
    // var infoString = CityName[nameCounter];
    var infoString = '1231';
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
      content: infoString
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
}
MapClick = function(){
    var lat,
        lang;
    google.maps.event.addListener(map, "click", function(event) {
        lat = event.latLng.lat();
        lng = event.latLng.lng();
        chengeMarkerCoordinate(lat,lng);
        console.log('sss');
    });
}
chengeMarkerCoordinate = function(lat,lng){
        initMarker(lat,lng);
        flightPath(lat,lng);
        sendRequestName(lat,lng);
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
sendRequestName = function(lat,lng){
  var path = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+lng+'&sensor=false';
  $.post( path, function( data ) {
    console.log(data['results']);
    // CityName.push(data['results'][0]['address_components'][3]['long_name']);
  });
}
TaskManager = function(){
    initMap();
    MapClick();
}
$(document).ready(function(){
    TaskManager();
});