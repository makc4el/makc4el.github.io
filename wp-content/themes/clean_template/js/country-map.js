var colors = ['#6659a3','transparent'];
var randomColor = ['#34d6b6','#5f9cfd','#fb9d77','#669966','#FDCF8B','#FEF65B','#99668C'];
var map;
var counter = 0;
var CountryCounter = 0;

function initialize() {
  var myOptions = {
    scrollwheel: false,
    navigationControl: false,
    mapTypeControl: false,
    scaleControl: false,
    draggable: true,
    disableDoubleClickZoom: true,
    zoom: 2,
    center: new google.maps.LatLng(10, 0),
    styles: [
      {elementType: 'geometry', stylers: [{color: '#6659a3'}]},
      {elementType: 'labels.text.stroke', stylers: [{color: '6659a3'}]},
      {elementType: 'labels.text.fill', stylers: [{color: '#ffffff'}]},
      {
        featureType: 'poi.park',
        elementType: 'labels.text.fill',
        stylers: [{color: '#6659a3'}]
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
      }
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
  // console.log(data['rows']);
  for (var i in rows) {
    if (rows[i][0] != 'Antarctica') {
      var newCoordinates = [];
      var geometries = rows[i][1]['geometries'];
      if (geometries) {
        for (var j in geometries) {
          newCoordinates.push(constructNewCoordinates(geometries[j]));
        }
      } else {
        newCoordinates = constructNewCoordinates(rows[i][1]['geometry']);
      }
      var country = new google.maps.Polygon({
        paths: newCoordinates,
        strokeColor: '#fff',
        strokeOpacity: 1,
        strokeWeight: 1,
        fillColor: colors[1],
        fillOpacity: 0.9,
        name: rows[i][0],
        chose : false,
      });
      google.maps.event.addListener(country, 'mouseover', function() {
      });
      google.maps.event.addListener(country, 'mouseout', function() {
      });
      google.maps.event.addListener(country, 'click', function() {
        // var randomnumber = Math.floor(Math.random() * 3);
        console.log($(this));
        console.log($(this)[0].name);
        var randNum = Math.floor(Math.random() * 6) + 1;
        if(!$(this)[0].chose){
          if(CountryCounter>=7){
            return 0;
          }
          CountryCounter++;
          // this.setOptions({fillOpacity: 1});
          $(this)[0].chose = true;
          this.setOptions({fillColor: randomColor[randNum],fillOpacity:1});
          randomColor = randomColor.splice(randNum,1);
          console.log(randomColor);
          counter++;
          if(counter>6){
            counter = 0;
          }
        }
        else{
          CountryCounter--;
          this.setOptions({fillColor: 'transparent'});
          $(this)[0].chose = false;
        }
      });

      country.setMap(map);
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
google.maps.event.addDomListener(window, 'load', initialize);