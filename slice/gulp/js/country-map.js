 var colors = ['#6659a3','transparent'];
      var randomColor = ['#33cc33','#0066ff','#cc33ff','#ffcc66','#cc0000'];
      var map;
      var counter = 0;
      var CountryCounter = 0;
      var StorageCoontinents = localStorage.getItem('coontinents').split(',');
      var StorageCountry ;
      var CountryArr = [];
      var CountryTransferArray = [];

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
          {country:"Russia",continent:"EUROPE"},
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

      function initialize() {
        var myOptions = {
            scrollwheel: false,
            navigationControl: false,
            mapTypeControl: false,
            scaleControl: false,
            draggable: true,
            disableDoubleClickZoom: true,
            zoom: 4,
            center: new google.maps.LatLng(localStorage.getItem('coord').split(',')[0], localStorage.getItem('coord').split(',')[1]),
          styles: [ {
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

        map = new google.maps.Map(document.getElementById('map-canvas'),
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
        // console.log(data['rows']);
        console.log(data);
        for (var i in rows) {
          console.log(rows[i][0]);
          if (rows[i][0] != 'Antarctica') {
            for(v = 0; v < countriesCon.length; v++){
              if(countriesCon[v]['country'] == rows[i][0]){
                  Coontinents = countriesCon[v]['continent'];
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
            console.log(StorageCoontinents.indexOf(Coontinents));
            console.log(rows[i][0]);
            if(StorageCoontinents.indexOf(Coontinents) != -1){
              var country = new google.maps.Polygon({
                paths: newCoordinates,
                strokeColor: '#fff',
                strokeOpacity: 1,
                strokeWeight: 1,
                fillColor: colors[1],
                fillOpacity: 1,
                name: rows[i][0],
                chose : false,
              });
              google.maps.event.addListener(country, 'click', function() {
                // var randomnumber = Math.floor(Math.random() * 3);
                console.log($(this));
                console.log($(this)[0].name);
                if(!$(this)[0].chose){
                    if(CountryCounter>=5){
                        return 0;
                    }
                    CountryCounter++;
                    CountryArr.push($(this)[0].name);
                 // this.setOptions({fillOpacity: 1});
                    $(this)[0].chose = true;
                    // this.setOptions({fillColor: randomColor[counter],fillOpacity:1});
                    this.setOptions({fillColor: getRandomColor(),fillOpacity:1});
                    counter++;
                    if(counter>2){
                        counter = 0;
                    }
                }
                else{
                  console.log($(this)[0].name);
                    CountryCounter--;
                    this.setOptions({fillColor: 'transparent'});
                    $(this)[0].chose = false;
                    for(var i = 0; i< CountryArr.length; i++){
                      if(CountryArr[i] == $(this)[0].name){
                        CountryArr[i] = " ";
                      }
                    }
                }
                var c = 0;
                CountryTransferArray = [];
                for(var i = 0; i < CountryArr.length; i++){
                  if(CountryArr[i] != " "){
                    CountryTransferArray[c] = CountryArr[i];
                    c++;
                  }
                }
                var elem = " ";
                for(var n = 0;n<CountryTransferArray.length;n++){
                  if (n!=0){
                    elem = $('.choose_map-title').text();
                  }
                  if(n == 0){
                    $('.choose_map-title').text(' '+elem+CountryTransferArray[n]);
                  }
                  else{
                      $('.choose_map-title').text(elem+' / '+CountryTransferArray[n]);
                  }

                  // if(n!=0){
                  // }
                  // if(n!=CountryTransferArray.length-1){
                  // }
                  // $('.choose_map-title').text(elem+CountryArr[i]);
                }
              });
            }
            else{
            var country = new google.maps.Polygon({
              paths: newCoordinates,
              strokeColor: colors[1],
              strokeOpacity: 1,
              strokeWeight: 1,
              fillColor: colors[0],
              fillOpacity: 1,
              name: rows[i][0],
              chose : false,
              });
            }
            google.maps.event.addListener(country, 'mouseover', function() {
            });
            google.maps.event.addListener(country, 'mouseout', function() {
            });
            country.setMap(map);
          }
        }
      }

      randomColor

      function getRandomColor() {
          var letters = '0123456789ABCDEF';
          var color = '#';
          for (var i = 0; i < 6; i++ ) {
              color += letters[Math.floor(Math.random() * 16)];
          }
          return color;
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
      google.maps.event.addDomListener(window, 'load', initialize);

      $('.choose_country__list').click(function(e) {
        e.preventDefault();
        var c = 0;
          for(var i = 0; i < CountryArr.length; i++){
            console.log(CountryArr[i]);
            if(CountryArr[i] != " "){
              CountryTransferArray[c] = CountryArr[i];
              c++;
            }
          }
          localStorage.setItem('country',CountryTransferArray);
          window.location = 'map-city.html'
      });