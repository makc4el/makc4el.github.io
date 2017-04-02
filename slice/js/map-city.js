 var colors = ['#6659a3','transparent'];
      var randomColor = ['#34d6b6','#5f9cfd','#fb9d77'];
      var map;
      var counter = 0;
      var CountryCounter = 0;
      var StorageCoontinents = localStorage.getItem('country').split(',');
      var StorageCountry ;
      var CountryArr = [];
      var CountryTransferArray = [];
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
      var CountryArr = [];

      var countriesCon = [
          {country:"Afghanistan", continent:"ASIA"},
          {country:"Åland Islands", continent:"EUROPE"},
          {country:"Albania", continent:"EUROPE"},
          {country:"Algeria", continent:"AFRICA"},
          {country:"American Samoa", continent:"AUSTRALIA"},
          {country:"Andorra", continent:"EUROPE"},
          {country:"Angola", continent:"AFRICA"},
          {country:"Anguilla", continent:"NORTH AMERICA"},
          {country:"Antarctica", continent:"Antarctica"},
          {country:"Antigua and Barbuda", continent:"NORTH AMERICA"},
          {country:"Argentina", continent:"SOUTH AMERICA"},
          {country:"Armenia", continent:"ASIA"},
          {country:"Aruba", continent:"NORTH AMERICA"},
          {country:"Australia", continent:"AUSTRALIA"},
          {country:"Austria", continent:"EUROPE"},
          {country:"Azerbaijan", continent:"ASIA"},
          {country:"Bahamas",continent:"NORTH AMERICA"},
          {country:"Bahrain",continent:"ASIA"},
          {country:"Bangladesh",continent:"ASIA"},
          {country:"Barbados",continent:"NORTH AMERICA"},
          {country:"Belarus",continent:"EUROPE"},
          {country:"Belgium",continent:"EUROPE"},
          {country:"Belize",continent:"NORTH AMERICA"},
          {country:"Benin",continent:"AFRICA"},
          {country:"Bermuda",continent:"NORTH AMERICA"},
          {country:"Bhutan",continent:"ASIA"},
          {country:"Bolivia",continent:"SOUTH AMERICA"},
          {country:"Bosnia and Herzegovina",continent:"EUROPE"},
          {country:"Botswana",continent:"AFRICA"},
          {country:"Bouvet Island",continent:"Antarctica"},
          {country:"Brazil",continent:"SOUTH AMERICA"},
          {country:"British Indian Ocean Territory",continent:"ASIA"},
          {country:"Brunei",continent:"ASIA"},
          {country:"Bulgaria",continent:"EUROPE"},
          {country:"Burkina Faso",continent:"AFRICA"},
          {country:"Burundi",continent:"AFRICA"},
          {country:"Cambodia",continent:"ASIA"},
          {country:"Cameroon",continent:"AFRICA"},
          {country:"Canada",continent:"NORTH AMERICA"},
          {country:"Cape Verde",continent:"AFRICA"},
          {country:"Cayman Islands",continent:"NORTH AMERICA"},
          {country:"Central African Rep.",continent:"AFRICA"},
          {country:"Chad",continent:"AFRICA"},
          {country:"Chile",continent:"SOUTH AMERICA"},
          {country:"China",continent:"ASIA"},
          {country:"Christmas Island",continent:"ASIA"},
          {country:"Cocos (Keeling) Islands",continent:"ASIA"},
          {country:"Colombia",continent:"SOUTH AMERICA"},
          {country:"Comoros",continent:"AFRICA"},
          {country:"Congo (Kinshasa)",continent:"AFRICA"},
          {country:"Congo (Brazzaville)",continent:"AFRICA"},
          {country:"Cook Islands",continent:"AUSTRALIA"},
          {country:"Costa Rica",continent:"NORTH AMERICA"},
          {country:"Ivory Coast",continent:"AFRICA"},
          {country:"Croatia",continent:"EUROPE"},
          {country:"Cuba",continent:"NORTH AMERICA"},
          {country:"N. Cyprus",continent:"ASIA"},
          {country:"Czech Rep.",continent:"EUROPE"},
          {country:"Denmark",continent:"EUROPE"},
          {country:"Djibouti",continent:"AFRICA"},
          {country:"Dominica",continent:"NORTH AMERICA"},
          {country:"Dominican Republic",continent:"NORTH AMERICA"},
          {country:"Ecuador",continent:"SOUTH AMERICA"},
          {country:"Egypt",continent:"AFRICA"},
          {country:"El Salvador",continent:"NORTH AMERICA"},
          {country:"Equatorial Guinea",continent:"AFRICA"},
          {country:"Eritrea",continent:"AFRICA"},
          {country:"Estonia",continent:"EUROPE"},
          {country:"Ethiopia",continent:"AFRICA"},
          {country:"Falkland Islands (Malvinas)",continent:"SOUTH AMERICA"},
          {country:"Faroe Islands",continent:"EUROPE"},
          {country:"Fiji",continent:"AUSTRALIA"},
          {country:"Finland",continent:"EUROPE"},
          {country:"France",continent:"EUROPE"},
          {country:"French Guiana",continent:"SOUTH AMERICA"},
          {country:"French Polynesia",continent:"AUSTRALIA"},
          {country:"French Southern Territories",continent:"Antarctica"},
          {country:"Gabon",continent:"AFRICA"},
          {country:"Gambia",continent:"AFRICA"},
          {country:"Georgia",continent:"ASIA"},
          {country:"Germany",continent:"EUROPE"},
          {country:"Ghana",continent:"AFRICA"},
          {country:"Gibraltar",continent:"EUROPE"},
          {country:"Greece",continent:"EUROPE"},
          {country:"Greenland",continent:"NORTH AMERICA"},
          {country:"Grenada",continent:"NORTH AMERICA"},
          {country:"Guadeloupe",continent:"NORTH AMERICA"},
          {country:"Guam",continent:"AUSTRALIA"},
          {country:"Guatemala",continent:"NORTH AMERICA"},
          {country:"Guernsey",continent:"EUROPE"},
          {country:"Guinea",continent:"AFRICA"},
          {country:"Guinea-bissau",continent:"AFRICA"},
          {country:"Guyana",continent:"SOUTH AMERICA"},
          {country:"Haiti",continent:"NORTH AMERICA"},
          {country:"Heard Island and Mcdonald Islands",continent:"Antarctica"},
          {country:"Holy See (Vatican City State)",continent:"EUROPE"},
          {country:"Honduras",continent:"NORTH AMERICA"},
          {country:"Hong Kong",continent:"ASIA"},
          {country:"Hungary",continent:"EUROPE"},
          {country:"Iceland",continent:"EUROPE"},
          {country:"India",continent:"ASIA"},
          {country:"Iran",continent:"ASIA"},
          {country:"Iraq",continent:"ASIA"},
          {country:"Ireland",continent:"EUROPE"},
          {country:"Isle of Man",continent:"EUROPE"},
          {country:"Israel",continent:"ASIA"},
          {country:"Italy",continent:"EUROPE"},
          {country:"Jamaica",continent:"NORTH AMERICA"},
          {country:"Japan",continent:"ASIA"},
          {country:"Jersey",continent:"EUROPE"},
          {country:"Jordan",continent:"ASIA"},
          {country:"Kazakhstan",continent:"ASIA"},
          {country:"Kenya",continent:"AFRICA"},
          {country:"Kiribati",continent:"AUSTRALIA"},
          {country:"N. Korea",continent:"ASIA"},
          {country:"Republic of Korea",continent:"ASIA"},
          {country:"Kuwait",continent:"ASIA"},
          {country:"Kyrgyzstan",continent:"ASIA"},
          {country:"Lao People's Democratic Republic",continent:"ASIA"},
          {country:"Latvia",continent:"EUROPE"},
          {country:"Lebanon",continent:"ASIA"},
          {country:"Lesotho",continent:"AFRICA"},
          {country:"Liberia",continent:"AFRICA"},
          {country:"Libya",continent:"AFRICA"},
          {country:"Liechtenstein",continent:"EUROPE"},
          {country:"Lithuania",continent:"EUROPE"},
          {country:"Luxembourg",continent:"EUROPE"},
          {country:"Macao",continent:"ASIA"},
          {country:"Macedonia",continent:"EUROPE"},
          {country:"Madagascar",continent:"AFRICA"},
          {country:"Malawi",continent:"AFRICA"},
          {country:"Malaysia",continent:"ASIA"},
          {country:"Maldives",continent:"ASIA"},
          {country:"Mali",continent:"AFRICA"},
          {country:"Malta",continent:"EUROPE"},
          {country:"Marshall Islands",continent:"AUSTRALIA"},
          {country:"Martinique",continent:"NORTH AMERICA"},
          {country:"Mauritania",continent:"AFRICA"},
          {country:"Mauritius",continent:"AFRICA"},
          {country:"Mayotte",continent:"AFRICA"},
          {country:"Mexico",continent:"NORTH AMERICA"},
          {country:"Micronesia",continent:"AUSTRALIA"},
          {country:"Moldova",continent:"EUROPE"},
          {country:"Monaco",continent:"EUROPE"},
          {country:"Mongolia",continent:"ASIA"},
          {country:"Montenegro",continent:"EUROPE"},
          {country:"Montserrat",continent:"NORTH AMERICA"},
          {country:"Morocco",continent:"AFRICA"},
          {country:"Mozambique",continent:"AFRICA"},
          {country:"Myanmar",continent:"ASIA"},
          {country:"Namibia",continent:"AFRICA"},
          {country:"Nauru",continent:"AUSTRALIA"},
          {country:"Nepal",continent:"ASIA"},
          {country:"Netherlands",continent:"EUROPE"},
          {country:"Netherlands Antilles",continent:"NORTH AMERICA"},
          {country:"New Caledonia",continent:"AUSTRALIA"},
          {country:"New Zealand",continent:"AUSTRALIA"},
          {country:"Nicaragua",continent:"NORTH AMERICA"},
          {country:"Niger",continent:"AFRICA"},
          {country:"Nigeria",continent:"AFRICA"},
          {country:"Niue",continent:"AUSTRALIA"},
          {country:"Norfolk Island",continent:"AUSTRALIA"},
          {country:"Northern Mariana Islands",continent:"AUSTRALIA"},
          {country:"Norway",continent:"EUROPE"},
          {country:"Oman",continent:"ASIA"},
          {country:"Pakistan",continent:"ASIA"},
          {country:"Palau",continent:"AUSTRALIA"},
          {country:"Palestinia",continent:"ASIA"},
          {country:"Panama",continent:"NORTH AMERICA"},
          {country:"Papua New Guinea",continent:"AUSTRALIA"},
          {country:"Paraguay",continent:"SOUTH AMERICA"},
          {country:"Peru",continent:"SOUTH AMERICA"},
          {country:"Philippines",continent:"ASIA"},
          {country:"Pitcairn",continent:"AUSTRALIA"},
          {country:"Poland",continent:"EUROPE"},
          {country:"Portugal",continent:"EUROPE"},
          {country:"Puerto Rico",continent:"NORTH AMERICA"},
          {country:"Qatar",continent:"ASIA"},
          {country:"Reunion",continent:"AFRICA"},
          {country:"Romania",continent:"EUROPE"},
          {country:"Russia",continent:"ASIA"},
          {country:"Rwanda",continent:"AFRICA"},
          {country:"Saint Helena",continent:"AFRICA"},
          {country:"Saint Kitts and Nevis",continent:"NORTH AMERICA"},
          {country:"Saint Lucia",continent:"NORTH AMERICA"},
          {country:"Saint Pierre and Miquelon",continent:"NORTH AMERICA"},
          {country:"Saint Vincent and The Grenadines",continent:"NORTH AMERICA"},
          {country:"Samoa",continent:"AUSTRALIA"},
          {country:"San Marino",continent:"EUROPE"},
          {country:"Sao Tome and Principe",continent:"AFRICA"},
          {country:"Saudi Arabia",continent:"ASIA"},
          {country:"Senegal",continent:"AFRICA"},
          {country:"Serbia",continent:"EUROPE"},
          {country:"Seychelles",continent:"AFRICA"},
          {country:"Sierra Leone",continent:"AFRICA"},
          {country:"Singapore",continent:"ASIA"},
          {country:"Slovakia",continent:"EUROPE"},
          {country:"Slovenia",continent:"EUROPE"},
          {country:"Solomon Is.",continent:"AUSTRALIA"},
          {country:"Somaliland",continent:"AFRICA"},
          {country:"South Africa",continent:"AFRICA"},
          {country:"South Georgia and The South Sandwich Islands",continent:"Antarctica"},
          {country:"Spain",continent:"EUROPE"},
          {country:"Sri Lanka",continent:"ASIA"},
          {country:"Sudan",continent:"AFRICA"},
          {country:"Suriname",continent:"SOUTH AMERICA"},
          {country:"Svalbard and Jan Mayen",continent:"EUROPE"},
          {country:"Swaziland",continent:"AFRICA"},
          {country:"Sweden",continent:"EUROPE"},
          {country:"Switzerland",continent:"EUROPE"},
          {country:"Syria",continent:"ASIA"},
          {country:"Taiwan, Province of China",continent:"ASIA"},
          {country:"Tajikistan",continent:"ASIA"},
          {country:"Tanzania",continent:"AFRICA"},
          {country:"Thailand",continent:"ASIA"},
          {country:"Timor-leste",continent:"ASIA"},
          {country:"Togo",continent:"AFRICA"},
          {country:"Tokelau",continent:"AUSTRALIA"},
          {country:"Tonga",continent:"AUSTRALIA"},
          {country:"Trinidad and Tobago",continent:"NORTH AMERICA"},
          {country:"Tunisia",continent:"AFRICA"},
          {country:"Turkey",continent:"ASIA"},
          {country:"Turkmenistan",continent:"ASIA"},
          {country:"Turks and Caicos Islands",continent:"NORTH AMERICA"},
          {country:"Tuvalu",continent:"AUSTRALIA"},
          {country:"Uganda",continent:"AFRICA"},
          {country:"Ukraine",continent:"EUROPE"},
          {country:"United Arab Emirates",continent:"ASIA"},
          {country:"United Kingdom",continent:"EUROPE"},
          {country:"United States",continent:"NORTH AMERICA"},
          {country:"United States Minor Outlying Islands",continent:"AUSTRALIA"},
          {country:"Uruguay",continent:"SOUTH AMERICA"},
          {country:"Uzbekistan",continent:"ASIA"},
          {country:"Vanuatu",continent:"AUSTRALIA"},
          {country:"Venezuela",continent:"SOUTH AMERICA"},
          {country:"Vietnam",continent:"ASIA"},
          {country:"Virgin Islands, British", continent:"NORTH AMERICA"},
          {country:"Virgin Islands, U.S.",continent:"NORTH AMERICA"},
          {country:"Wallis and Futuna",continent:"AUSTRALIA"},
          {country:"W. Sahara",continent:"AFRICA"},
          {country:"Yemen",continent:"ASIA"},
          {country:"Indonesia",continent:"ASIA"},
          {country:"Zambia",continent:"AFRICA"},
          {country:"Zimbabwe",continent:"AFRICA"}
          ];

      function initMap() {
        var myOptions = {
           // scrollwheel: false,
            navigationControl: false,
            mapTypeControl: false,
            //scaleControl: false,
            draggable: true,
            disableDoubleClickZoom: true,
            zoom: 6,
            center: new google.maps.LatLng(localStorage.getItem('coord').split(',')[0], localStorage.getItem('coord').split(',')[1]),
          styles: [{
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
            ]}
                ],
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('map-city'),
            myOptions);

        // Initialize JSONP request
        var script = document.createElement('script');
        var url = ['https://www.googleapis.com/fusiontables/v1/query?'];
        url.push('sql=');
        var query = 'SELECT name, kml_4326 FROM ' +
            '1foc3xO9DyfSIF6ofvN0kp2bxSfSeKog5FbdWdQ';
        var encodedQuery = encodeURIComponent(query);
        url.push(encodedQuery);
        url.push('&callback=drawMap');
        url.push('&key=AIzaSyAm9yWCV7JPCTHCJut8whOjARd7pwROFDQ');
        script.src = url.join('');
        var body = document.getElementsByTagName('body')[0];
        body.appendChild(script);
      }

      function drawMap(data) {
        var rows = data['rows'];
        var Coontinents = 0;
        var Find
        for (var i in rows) {
          if (rows[i][0] != 'Antarctica') {
            var Draw = false;
            for(v = 0; v < StorageCoontinents.length; v++){
              if(StorageCoontinents[v] == rows[i][0]){
                  Coontinents = StorageCoontinents[v];
                  Draw = true;
              }
              else{

              } 
            }
            // if(.indexOf(Coontinents)){}
            // for(countriesCon[i][0])
            var newCoordinates = [];
            var geometries = rows[i][1]['geometries'];
            if (geometries) {
              for (var j in geometries) {
                newCoordinates.push(constructNewCoordinates(geometries[j]));
              }
            } else {
              newCoordinates = constructNewCoordinates(rows[i][1]['geometry']);
            }
            if(!Draw){
            var country = new google.maps.Polygon({
              paths: newCoordinates,
              strokeColor: colors[0],
              strokeOpacity: 1,
              strokeWeight: 1,
              fillColor: colors[0],
              fillOpacity: 1,
              name: rows[i][0],
              chose : false,
              });
            google.maps.event.addListener(country, 'mouseover', function() {
            });
            google.maps.event.addListener(country, 'mouseout', function() {
            });
            country.setMap(map);
            }
          }
        }
      }

      function constructNewCoordinates(polygon) {
        var newCoordinates = [];
        var coordinates = polygon['coordinates'][0];
        for (var i in coordinates) {
          newCoordinates.push(
              new google.maps.LatLng(coordinates[i][1], coordinates[i][0]));
        }
        return newCoordinates;
      }
       google.maps.event.addDomListener(window, 'dblclick', function(){
        return 0;
       });
      // google.maps.event.addDomListener(window, 'load', initMap);

      $('.choose_country__list').click(function(e) {
        e.preventDefault();
        var c = 0;
          for(var i = 0; i < CountryArr.length; i++){
            if(CountryArr[i] != " "){
              CountryTransferArray[c] = CountryArr[i];
              c++;
            }
          }
          localStorage.setItem('country',CountryTransferArray);
          window.location = 'map.html'
      });




findCity = function(marker){
    var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
    geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[1]) {
              console.log(marker);
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
            console.log(marker);
            marker.setMap(null);
            return 0;
        }
    }
    else{
            console.log(marker);
            marker.setMap(null);
            return 0; 
    }
    });
}

initMarker = function(lat,lng){
    var coordinates = {lat: lat, lng: lng};
    var iconUrld = 'marker.png';
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
        console.log(Marker);
    markeArr.push(Marker);
    CountryArr.push(Marker);
    findCity(Marker);
    google.maps.event.addListener(Marker, 'dragend', function(e) {
        var MarkerLat,
            MarkerLng;
        flightPathClean();
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
        if(MarkerCounter < 7){
            initMarker(lat,lng);
        }
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
     $('.choose_btn').click(function(e){
      e.preventDefault();
      localStorage.setItem('StorageCountry',CityName);
  });
}); 