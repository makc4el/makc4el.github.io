function initialize() {
  geocoder=new google.maps.Geocoder
}

var Marker,
  map,
  markerCounter=0,
  flightPlanCoordinates=[],
  myPos= {
    lat: -34.397, lng: 150.644
  }

  ,
  markeArr=[],
  LinePathArr=[],
  service,
  geocoder,
  CityName=[],
  infowindow,
  nameCounter=0,
  name,
  geocoder,
  city;
initMap=function() {
  map=new google.maps.Map(document.getElementById("map"), {
      center:myPos, zoom:4, styles:[ {
        elementType:"geometry", stylers:[ {
          color: "#6659a3"
        }
        ]
      }
        , {
          elementType:"labels.text.stroke", stylers:[ {
            color: "#6659a3"
          }
          ]
        }
        , {
          elementType:"labels.text.fill", stylers:[ {
            color: "#ffffff"
          }
          ]
        }
        , {
          featureType:"poi.park", elementType:"labels.text.fill", stylers:[ {
            color: "#fff"
          }
          ]
        }
        , {
          featureType:"road", elementType:"geometry", stylers:[ {
            color: "#fff"
          }
          ]
        }
        , {
          featureType:"road", elementType:"geometry.stroke", stylers:[ {
            color: "transparent"
          }
          ]
        }
        , {
          featureType:"road", elementType:"labels.text.fill", stylers:[ {
            color: "#fff"
          }
          ]
        }
        , {
          featureType:"road.highway", elementType:"geometry", stylers:[ {
            color: "transparent"
          }
          ]
        }
        , {
          featureType:"road.highway", elementType:"geometry.stroke", stylers:[ {
            color: "transparent"
          }
          ]
        }
        , {
          featureType:"road.highway", elementType:"labels.text.fill", stylers:[ {
            color: "#fff"
          }
          ]
        }
        , {
          featureType:"transit", elementType:"geometry", stylers:[ {
            color: "#2f3948"
          }
          ]
        }
        , {
          featureType:"transit.station", elementType:"labels.text.fill", stylers:[ {
            color: "#282560"
          }
          ]
        }
        , {
          featureType:"water", elementType:"geometry", stylers:[ {
            color: "#282560"
          }
          ]
        }
        , {
          featureType:"water", elementType:"labels.text.fill", stylers:[ {
            color: "#282560"
          }
          ]
        }
        , {
          featureType:"water", elementType:"labels.text.stroke", stylers:[ {
            color: "#282560"
          }
          ]
        }
      ]
    }
  )
}

  ,
  initMarker=function(e, t) {
    var r=new google.maps.LatLng(e, t);
    geocoder.geocode( {
        latLng: r
      }
      , function(r, a) {
        if(a==google.maps.GeocoderStatus.OK)if(console.log(r[0].formatted_address.split(",")[r[0].formatted_address.split(",").length-1]), r[1]) {
          name=r[0].formatted_address;
          for(var o=0;
              o<r[0].address_components.length;
              o++)for(var n=0;
                      n<r[0].address_components[o].types.length;
                      n++)if("administrative_area_level_1"==r[0].address_components[o].types[n]) {
              city=r[0].address_components[o];
              break
            }
          name=city.short_name+" "+city.long_name;
          CityName.push(name);
          console.log(CityName);
          var l= {
            lat: e, lng: t
          }
            , s=path+"images/marker.png";
          Marker=new google.maps.Marker( {
              position: l, draggable: !0, map: map, icon: s
            }
          ), markeArr.push(Marker), infowindow=new google.maps.InfoWindow( {
              content: name
            }
          ), infowindow.open(map, Marker), google.maps.event.addListener(Marker, "dragend", function(e) {
              var t, r;
              flightPathClean();
              for(var a=0;
                  a<markeArr.length;
                  a++)t=markeArr[a].position.lat(), r=markeArr[a].position.lng(), flightPath(t, r)
            }
          )
        }
        else alert("No results found");
        else alert("Geocoder failed due to: "+a)
      }
    )
  }

  ,
  MapClick=function() {
    var e;
    google.maps.event.addListener(map, "click", function(t) {
        e=t.latLng.lat(), lng=t.latLng.lng(), chengeMarkerCoordinate(e, lng)
      }
    )
  }

  ,
  chengeMarkerCoordinate=function(e, t) {
    initMarker(e, t),
      flightPath(e, t)
  }

  ,
  flightPathClean=function() {
    flightPlanCoordinates=[];
    for(var e=0;
        e<LinePathArr.length;
        e++)LinePathArr[e].setMap(null)
  }

  ,
  flightPath=function(e, t) {
    element= {}
      ,
      element.lat=e,
      element.lng=t,
      flightPlanCoordinates.push(element),
    markeArr.length>1&&(LinePath=new google.maps.Polyline( {
        path: flightPlanCoordinates, geodesic: !0, strokeColor: "#fff ", strokeOpacity: 1, strokeWeight: 2
      }
    ), LinePathArr.push(LinePath), LinePath.setMap(map))
  }

  ,
  TaskManager=function() {
    initMap(),
      MapClick(),
      initialize()
  }

  ,
  $(document).ready(function() {
      TaskManager()
    }

  );