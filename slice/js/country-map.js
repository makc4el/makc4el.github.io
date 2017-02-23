function initialize(){var e={scrollwheel:!1,navigationControl:!1,mapTypeControl:!1,scaleControl:!1,draggable:!0,disableDoubleClickZoom:!0,zoom:2,center:new google.maps.LatLng(10,0),styles:[{elementType:"geometry",stylers:[{color:"#6659a3"}]},{elementType:"labels.text.stroke",stylers:[{color:"6659a3"}]},{elementType:"labels.text.fill",stylers:[{color:"#ffffff"}]},{featureType:"poi.park",elementType:"labels.text.fill",stylers:[{color:"#6659a3"}]},{featureType:"road",elementType:"geometry",stylers:[{color:"#fff"}]},{featureType:"road",elementType:"geometry.stroke",stylers:[{color:"transparent"}]},{featureType:"road",elementType:"labels.text.fill",stylers:[{color:"#fff"}]},{featureType:"road.highway",elementType:"geometry",stylers:[{color:"transparent"}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"transparent"}]},{featureType:"road.highway",elementType:"labels.text.fill",stylers:[{color:"#fff"}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#2f3948"}]},{featureType:"transit.station",elementType:"labels.text.fill",stylers:[{color:"#282560"}]},{featureType:"water",elementType:"geometry",stylers:[{color:"#282560"}]},{featureType:"water",elementType:"labels.text.fill",stylers:[{color:"#282560"}]},{featureType:"water",elementType:"labels.text.stroke",stylers:[{color:"#282560"}]}],mapTypeId:google.maps.MapTypeId.ROADMAP};map=new google.maps.Map(document.getElementById("map-canvas"),e);var t=document.createElement("script"),o=["https://www.googleapis.com/fusiontables/v1/query?"];o.push("sql=");var r="SELECT name, kml_4326 FROM 1foc3xO9DyfSIF6ofvN0kp2bxSfSeKog5FbdWdQ",l=encodeURIComponent(r);o.push(l),o.push("&callback=drawMap"),o.push("&key=AIzaSyAm9yWCV7JPCTHCJut8whOjARd7pwROFDQ"),t.src=o.join("");var a=document.getElementsByTagName("body")[0];a.appendChild(t)}function drawMap(e){var t=e.rows;for(var o in t)if("Antarctica"!=t[o][0]){var r=[],l=t[o][1].geometries;if(l)for(var a in l)r.push(constructNewCoordinates(l[a]));else r=constructNewCoordinates(t[o][1].geometry);var s=new google.maps.Polygon({paths:r,strokeColor:"#fff",strokeOpacity:1,strokeWeight:1,fillColor:colors[1],fillOpacity:.9,name:t[o][0],chose:!1});google.maps.event.addListener(s,"mouseover",function(){}),google.maps.event.addListener(s,"mouseout",function(){}),google.maps.event.addListener(s,"click",function(){if(console.log($(this)),console.log($(this)[0].name),$(this)[0].chose)CountryCounter--,this.setOptions({fillColor:"transparent"}),$(this)[0].chose=!1;else{if(CountryCounter>=3)return 0;CountryCounter++,$(this)[0].chose=!0,this.setOptions({fillColor:randomColor[counter],fillOpacity:1}),counter++,counter>2&&(counter=0)}}),s.setMap(map)}}function constructNewCoordinates(e){var t=[],o=e.coordinates[0];for(var r in o)t.push(new google.maps.LatLng(o[r][1],o[r][0]));return t}var colors=["#6659a3","transparent"],randomColor=["#34d6b6","#5f9cfd","#fb9d77"],map,counter=0,CountryCounter=0;google.maps.event.addDomListener(window,"dblclick",function(){return 0}),google.maps.event.addDomListener(window,"load",initialize);