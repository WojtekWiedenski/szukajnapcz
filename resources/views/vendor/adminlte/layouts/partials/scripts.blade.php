<!-- REQUIRED JS SCRIPTS -->
<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>


<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3eXJYKGx1HRqvRKpO13qiy13iYcJqS3o&callback=initMap&libraries=places"></script>
<!--
<script src="{{ asset('/js/front_map.js') }}" type="text/javascript"></script>
-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js" type="text/javascript"></script>
<script>
window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
]); ?>
</script>
