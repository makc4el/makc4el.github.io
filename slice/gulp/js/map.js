var Marker,
    map,
    markerCounter = 0,
    flightPlanCoordinates = [],
    myPos = {lat: 46.635417, lng: 32.616867},
    markeArr = [],
    LinePathArr = [],
    InfoBoxArr = [],
    service,
    geocoder,
    CityName = [],
    infowindow,
    nameCounter = 0,
    name, 
    geocoder,
    city;
    var MarkerCounter = 0;
var CountrList = [];
var ArrCity = [];

initMap = function(){ 
        map = new google.maps.Map(document.getElementById('map'), {
        center: myPos,
        zoom: 9,
        styles: [
  {
    "stylers": [
      {
        "color": "#ffffff"
      },
      {
        "visibility": "on"
      },
      {
        "weight": 0.5
      }
    ]
  },
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#212121"
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#7984ce"
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#212121"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#ffffff"
      },
      {
        "visibility": "on"
      },
      {
        "weight": 1
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ffffff"
      },
      {
        "visibility": "on"
      },
      {
        "weight": 1
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      {
        "color": "#e0def5"
      },
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#ad3033"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#ffffff"
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "administrative.neighborhood",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#ad3033"
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "administrative.neighborhood",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#ad3033"
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#ffffff"
      },
      {
        "visibility": "on"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#ffffff"
      },
      {
        "visibility": "simplified"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#1b1b1b"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8a8a8a"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#d2c7f1"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dbdaef"
      },
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#4e4e4e"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "water",
    "stylers": [
      {
        "color": "#ffffff"
      },
      {
        "visibility": "on"
      },
      {
        "weight": 0.5
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#6569ba"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#3d3d3d"
      }
    ]
  }
]
    });
}  

findCity = function(marker){
    var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
            for(i = 0;i < results[0].address_components.length;i++){
                if(results[0].address_components[i]['types'][0] == 'locality'){
                    name =  results[0].address_components[i]['long_name'];
                    CityName.push(name);
                    setInfoBox(name,marker);
                    flightPath(marker.position.lat(), marker.position.lng());
                    MarkerCounter++;
                    return 0;
                }
                else if(results[0].address_components[i]['types'][0] == "administrative_area_level_2"){
                    name =  results[0].address_components[i]['short_name'];
                    CityName.push(name);
                    setInfoBox(name,marker);
                    flightPath(marker.position.lat(), marker.position.lng());
                    MarkerCounter++;
                    return 0;
                } 
            }
        }
        else{
            return 0;
        }
    }
    });
}

initMarker = function(lat,lng){
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
    markeArr.push(Marker);
    findCity(Marker);
    google.maps.event.addListener(Marker, 'dragend', function(e) {
        var MarkerLat,
            MarkerLng;
        flightPathClean();
        console.log(markeArr.length);
        console.log(markeArr);
        for(var i = 0;i<markeArr.length;i++){
            MarkerLat = markeArr[i]['position'].lat();
            MarkerLng = markeArr[i]['position'].lng();
            flightPath(MarkerLat,MarkerLng);
            refindCity(markeArr[i]);
        }
    });
}


finalGet = function(){
    CityName = [];
    for(var i = 0;i<markeArr.length;i++){
        finalGetCity(markeArr[i]);
    }
}

 finalGetCity = function(marker){
    var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                for(i = 0;i < results[0].address_components.length;i++){
                    if(results[0].address_components[i]['types'][0] == 'locality'){
                        name =  results[0].address_components[i]['long_name'];
                        CityName.push(name);
                        localStorage.setItem("CityName", CityName);
                        return 0;
                    }
                    else if(results[0].address_components[i]['types'][0] == "administrative_area_level_2"){
                        name =  results[0].address_components[i]['short_name'];
                        CityName.push(name);
                        localStorage.setItem("CityName", CityName);
                        return 0;
                    }
                }
            }
            else{
                return 0;
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
        if(MarkerCounter < 8)
            initMarker(lat,lng);
    });
}



 refindCity = function(marker){
    var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
                for(i = 0;i < results[0].address_components.length;i++){
                    if(results[0].address_components[i]['types'][0] == 'locality'){
                        name =  results[0].address_components[i]['long_name'];
                        resetInfoBox(marker,name);
                        return 0;
                    }
                    else if(results[0].address_components[i]['types'][0] == "administrative_area_level_2"){
                        name =  results[0].address_components[i]['short_name'];
                        resetInfoBox(marker,name);
                        return 0;
                    }
                }
            }
            else{
                return 0;
            }
        }
    });
 }

resetInfoBox = function(Marker,name){
    var InfoContent = '<div class="MyInfo">'+name+'</div>';
      infowindow = new google.maps.InfoWindow({
      content: InfoContent,
    });
    infowindow.open(map, Marker);
}
flightPathClean = function(){
    flightPlanCoordinates = [];
    for(var i = 0;i <LinePathArr.length;i++){
        LinePathArr[i].setMap(null);
    }
}
setInfoBox = function(name,Marker){
    var InfoContent = '<div class="MyInfo">'+name+'</div>';
      infowindow = new google.maps.InfoWindow({
      content: InfoContent,
    });
    infowindow.open(map, Marker);
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

NextStep = function(){
    $('.choose_btn').click(function(event){
        event.preventDefault();
        finalGet();
    });
}

TaskManager = function(){
    initMap();
    MapClick();
    initialize();
}
$(document).ready(function(){
    TaskManager();
    NextStep();
    setInterval(function(){
        $('.gm-style-iw').prev().hide();
    },50);
}); 