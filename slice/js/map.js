var Marker,map,markerCounter=0,flightPlanCoordinates=[],myPos={lat:-34.397,lng:150.644},markeArr=[],LinePathArr=[],service,geocoder,CityName=[],infowindow,nameCounter=0;initMap=function(){map=new google.maps.Map(document.getElementById("map"),{center:myPos,zoom:2,styles:[{elementType:"geometry",stylers:[{color:"#6659a3"}]},{elementType:"labels.text.stroke",stylers:[{color:"#6659a3"}]},{elementType:"labels.text.fill",stylers:[{color:"#ffffff"}]},{featureType:"poi.park",elementType:"labels.text.fill",stylers:[{color:"#fff"}]},{featureType:"road",elementType:"geometry",stylers:[{color:"#fff"}]},{featureType:"road",elementType:"geometry.stroke",stylers:[{color:"transparent"}]},{featureType:"road",elementType:"labels.text.fill",stylers:[{color:"#fff"}]},{featureType:"road.highway",elementType:"geometry",stylers:[{color:"transparent"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"transparent"}]},{featureType:"road.highway",elementType:"labels.text.fill",stylers:[{color:"#fff"}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#2f3948"}]},{featureType:"transit.station",elementType:"labels.text.fill",stylers:[{color:"#282560"}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#282560"}]},{featureType:"water",elementType:"labels.text.fill",stylers:[{color:"#282560"}]},{featureType:"water",elementType:"labels.text.stroke",stylers:[{color:"#282560"}]}]})},initMarker=function(e,t){var r="1231",a={lat:e,lng:t},l="images/marker.png";Marker=new google.maps.Marker({position:a,draggable:!0,map:map,icon:l}),markeArr.push(Marker),infowindow=new google.maps.InfoWindow({content:r}),infowindow.open(map,Marker),google.maps.event.addListener(Marker,"dragend",function(e){var t,r;flightPathClean();for(var a=0;a<markeArr.length;a++)t=markeArr[a].position.lat(),r=markeArr[a].position.lng(),flightPath(t,r)})},MapClick=function(){var e;google.maps.event.addListener(map,"click",function(t){e=t.latLng.lat(),lng=t.latLng.lng(),chengeMarkerCoordinate(e,lng),console.log("sss")})},chengeMarkerCoordinate=function(e,t){initMarker(e,t),flightPath(e,t),sendRequestName(e,t)},flightPathClean=function(){flightPlanCoordinates=[];for(var e=0;e<LinePathArr.length;e++)LinePathArr[e].setMap(null)},flightPath=function(e,t){element={},element.lat=e,element.lng=t,flightPlanCoordinates.push(element),markeArr.length>1&&(LinePath=new google.maps.Polyline({path:flightPlanCoordinates,geodesic:!0,strokeColor:"#fff ",strokeOpacity:1,strokeWeight:2}),LinePathArr.push(LinePath),LinePath.setMap(map))},sendRequestName=function(e,t){var r="http://maps.googleapis.com/maps/api/geocode/json?latlng="+e+","+t+"&sensor=false";$.post(r,function(e){console.log(e.results)})},TaskManager=function(){initMap(),MapClick()},$(document).ready(function(){TaskManager()});