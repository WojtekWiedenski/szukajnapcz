

		var map;
		var LatLng = {lat: 50.8227604, lng: 19.1118004};

		function initMap(){

			createMap();
			searchObject(50.8227604, 19.1118004);
			//nearbySearch(LatLng, "school");
			marker.addListener('click', function() {
	          infowindow.open(map, marker);
	        });
		};
		
		function createMap(){
			map = new google.maps.Map(document.getElementById('map'), {
	          center: {lat: 50.8227604, lng: 19.1118004},
	          zoom: 17,
	        //  styles: styles,
	          mapTypeControl: false
	        });

	        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the '+
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
            'south west of the nearest large town, Alice Springs; 450&#160;km '+
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
            'features of the Uluru - Kata Tjuta National Park. Uluru is '+
            'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
            'Aboriginal people of the area. It has many springs, waterholes, '+
            'rock caves and ancient paintings. Uluru is listed as a World '+
            'Heritage Site.</p>'+
            '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
            'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
            '(last visited June 22, 2009).</p>'+
            '</div>'+
            '</div>';

	        var infowindow = new google.maps.InfoWindow({
	          content: contentString
	        });


		}
		

		marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

		function createMarker(latlng, icn, name) {
			var marker = new google.maps.Marker({
				position: latlng,
				map: map,
				icon: icn,
				title: name
			});
		}



		function searchObject(lat,lng){
			$.post('http://szukajnapcz.pl/api/SearchObject',{lat:lat,lng:lng},function(match){
				$.each(match,function(i,val){
					glatval=val.lat;
					glngval=val.lng;
					gname=val.name;

					GLatLng = new google.maps.LatLng(glatval, glngval);
					gicn= 'https://cdn2.iconfinder.com/data/icons/bitsies/128/Location-32.png';

					createMarker();
				});
			});
		}

		function nearbySearch(myLatLng,type){
			var request = {
				location: myLatLng,
				radius: '2500',
				types: [type]
			};

			service = new google.maps.places.PlacesService(map);
			service.nearbySearch(request, callback);

			function callback(results, status) {
			  if (status == google.maps.places.PlacesServiceStatus.OK) {
			    for (var i = 0; i < results.length; i++) {
			      var place = results[i];
			      console.log(place);
			      latlng = place.geometry.location;
			      icn = 'https://cdn2.iconfinder.com/data/icons/snipicons/500/map-marker-128.png';
			      name = place.name;
			      createMarker(latlng, icn, name);
			    }
			  }
			}
		}; /*end nearbySearch*/

		
/*
	  var map;

      // Create a new blank array for all the listing markers.
      var markers = [];

      // This global polygon variable is to ensure only ONE polygon is rendered.
      var polygon = null;

    function initMap() {
        // Create a styles array to use with the map.
        var styles = [
          {
            featureType: 'water',
            stylers: [
              { color: '#19a0d8' }
            ]
          },{
            featureType: 'administrative',
            elementType: 'labels.text.stroke',
            stylers: [
              { color: '#ffffff' },
              { weight: 6 }
            ]
          },{
            featureType: 'administrative',
            elementType: 'labels.text.fill',
            stylers: [
              { color: '#e85113' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [
              { color: '#efe9e4' },
              { lightness: -40 }
            ]
          },{
            featureType: 'transit.station',
            stylers: [
              { weight: 9 },
              { hue: '#e85113' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'labels.icon',
            stylers: [
              { visibility: 'off' }
            ]
          },{
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [
              { lightness: 100 }
            ]
          },{
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [
              { lightness: -100 }
            ]
          },{
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [
              { visibility: 'on' },
              { color: '#f0e4d3' }
            ]
          },{
            featureType: 'road.highway',
            elementType: 'geometry.fill',
            stylers: [
              { color: '#efe9e4' },
              { lightness: -25 }
            ]
          }
        ];

        // Constructor creates a new map - only center and zoom are required.
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 50.8227604, lng: 19.1118004},
          zoom: 17,
          styles: styles,
          mapTypeControl: false
        });

	    var locations = [
	        {title: 'Herkules', location:{lat: 50.824207, lng: 19.110362}}, //Herkules
	        {title: 'Skrzat', location:{lat: 50.824388, lng: 19.110939}}, //Skrzat
	        {title: 'Maluch', location:{lat: 50.824808, lng: 19.113058}}, //Maluch
	        {title: 'Blizniak', location:{lat: 50.824800, lng: 19.114329}} //Blizniak
	    ]

        var largeInfowindow = new google.maps.InfoWindow();

        // Style the markers a bit. This will be our listing marker icon.
        var defaultIcon = makeMarkerIcon('0091ff');

        // Create a "highlighted location" marker color for when the user
        // mouses over the marker.
        var highlightedIcon = makeMarkerIcon('FFFF24');

        // The following group uses the location array to create an array of markers on initialize.
        for (var i = 0; i < locations.length; i++) {
          // Get the position from the location array.
          var position = locations[i].location;
          var title = locations[i].title;
          // Create a marker per location, and put into markers array.
          var marker = new google.maps.Marker({
            position: position,
            title: title,
            animation: google.maps.Animation.DROP,
            icon: defaultIcon,
            id: i
          });
          // Push the marker to our array of markers.
          markers.push(marker);
          // Create an onclick event to open the large infowindow at each marker.
          marker.addListener('click', function() {
            populateInfoWindow(this, largeInfowindow);
          });
          // Two event listeners - one for mouseover, one for mouseout,
          // to change the colors back and forth.
          marker.addListener('mouseover', function() {
            this.setIcon(highlightedIcon);
          });
          marker.addListener('mouseout', function() {
            this.setIcon(defaultIcon);
          });
        }

        document.getElementById('show-listings').addEventListener('click', showListings);
        document.getElementById('hide-listings').addEventListener('click', hideListings);

	    function showListings() {
	        var bounds = new google.maps.LatLngBounds();
	        // Extend the boundaries of the map for each marker and display the marker
	        for (var i = 0; i < markers.length; i++) {
	          markers[i].setMap(map);
	          bounds.extend(markers[i].position);
	        }
	        map.fitBounds(bounds);
	    }
	    function hideListings() {
	        for (var i = 0; i < markers.length; i++) {
	          markers[i].setMap(null);
	        }
	    }
	    function makeMarkerIcon(markerColor) {
	        var markerImage = new google.maps.MarkerImage(
	          'http://chart.googleapis.com/chart?chst=d_map_spin&chld=1.15|0|'+ markerColor +
	          '|40|_|%E2%80%A2',
	          new google.maps.Size(21, 34),
	          new google.maps.Point(0, 0),
	          new google.maps.Point(10, 34),
	          new google.maps.Size(21,34));
	        return markerImage;
	    }
	    function zoomToArea() {
	        // Initialize the geocoder.
	        var geocoder = new google.maps.Geocoder();
	        // Get the address or place that the user entered.
	        var address = document.getElementById('zoom-to-area-text').value;
	        // Make sure the address isn't blank.
	        if (address == '') {
	          window.alert('You must enter an area, or address.');
	        } else {
	          // Geocode the address/area entered to get the center. Then, center the map
	          // on it and zoom in
	          geocoder.geocode(
	            { address: address,
	              componentRestrictions: {locality: 'New York'}
	            }, function(results, status) {
	              if (status == google.maps.GeocoderStatus.OK) {
	                map.setCenter(results[0].geometry.location);
	                map.setZoom(15);
	              } else {
	                window.alert('We could not find that location - try entering a more' +
	                    ' specific place.');
	              }
	            });
	        }
	    }
	    function searchWithinTime() {
	        // Initialize the distance matrix service.
	        var distanceMatrixService = new google.maps.DistanceMatrixService;
	        var address = document.getElementById('search-within-time-text').value;
	        // Check to make sure the place entered isn't blank.
	        if (address == '') {
	          window.alert('You must enter an address.');
	        } else {
	          hideListings();
	          // Use the distance matrix service to calculate the duration of the
	          // routes between all our markers, and the destination address entered
	          // by the user. Then put all the origins into an origin matrix.
	          var origins = [];
	          for (var i = 0; i < markers.length; i++) {
	            origins[i] = markers[i].position;
	          }
	          var destination = address;
	          var mode = document.getElementById('mode').value;
	          // Now that both the origins and destination are defined, get all the
	          // info for the distances between them.
	          distanceMatrixService.getDistanceMatrix({
	            origins: origins,
	            destinations: [destination],
	            travelMode: google.maps.TravelMode[mode],
	            unitSystem: google.maps.UnitSystem.IMPERIAL,
	          }, function(response, status) {
	            if (status !== google.maps.DistanceMatrixStatus.OK) {
	              window.alert('Error was: ' + status);
	            } else {
	              displayMarkersWithinTime(response);
	            }
	          });
	        }
	    }
  	};

  	*/