<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5 - Multiple markers in google map using gmaps.js</title>
	


  	<style type="text/css">
    	#mymap {
      		border:1px solid red;
      		width: 800px;
      		height: 500px;
    	}
  	</style>

</head>
<body>

  <h1>Laravel 5 - Multiple markers in google map using gmaps.js</h1>

  <div id="mymap"></div>

  <script type="text/javascript">

    GMaps.geolocate({
      success: function(position) {
        map.setCenter(position.coords.latitude, position.coords.longitude);
      },
      error: function(error) {
        alert('Geolocation failed: '+error.message);
      },
      not_supported: function() {
        alert("Your browser does not support geolocation");
      },
      always: function() {
        alert("Done!");
      }
    });

    var objects = <?php print_r(json_encode($objects)) ?>;

    var mymap = new GMaps({
      el: '#mymap',
      lat: 50.8227604,
      lng: 19.1118004,
      zoom:15
    });
    

    $.each(objects , function(i, val) { 
        mymap.addMarker({
        lat: val.lng,
        lng: val.lat,
        title: val.name,
        click: function(e) {
          alert('You clicked '+val.name+' in this marker');
        }
        });
    });

  </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3eXJYKGx1HRqvRKpO13qiy13iYcJqS3o"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

</body>
</html>