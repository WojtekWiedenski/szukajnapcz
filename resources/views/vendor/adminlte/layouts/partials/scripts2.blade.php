<!-- SKRYPTY WYSWIETLANE NA STRONIE GLOWNEJ -->
<!-- REQUIRED JS SCRIPTS -->
<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script type="text/javascript">

    var objects = <?php print_r(json_encode($objects)) ?>;

    var map = new GMaps({
      el: '#map',
      lat: 50.8227604,
      lng: 19.1118004,
      zoom:16
    });

    $.each(objects , function(i, val) { 
        map.addMarker({
        lat: val.lng,
        lng: val.lat,
        title: val.name,
        infoWindow: {
          content: '<b>'+val.name+'</b>'+val.id
        },
        click: function(e) {
         // infowindow.open(map, marker);
         // alert('You clicked '+val.name+' in this marker');
        //$(".control-sidebar-open").show();
         $( ".control-sidebar" ).addClass( "control-sidebar-open" );
         $( ".tab-content" ).addClass( "control-sidebar-open" );
        }
        });
    });

  </script>
<!--
<script src="{{ asset('/js/front_map.js') }}" type="text/javascript"></script>
-->

<script>
window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
]); ?>
</script>