<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>{{ trans('adminlte_lang::message.landingdescriptionpratt') }}</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <style type="text/css">
    	#map {
      		border:1px solid gray;
      		width: 100%;
      		height: 400px;
    	}
    	
  	</style>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>
<body data-spy="scroll" data-offset="0" data-target="#navigation">
   <div id="app">
   		<div id="navigation" class="navbar navbar-default navbar-fixed-top">
	        <div class="container">
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#"><b>szukajnaPCz</b></a>
	            </div>
	            <div class="navbar-collapse collapse">
	                <ul class="nav navbar-nav">
	                    <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
	                    <li><a href="#desc" class="smoothScroll">Opis projektu</a></li>
	                    <li><a href="#showcase" class="smoothScroll">Funkcje projektu</a></li>
	                    <li><a href="#contact" class="smoothScroll">Kontakt</a></li>
	                </ul>
	                <ul class="nav navbar-nav navbar-right">
	                    @if (Auth::guest())
	                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
	                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
	                    @else
	                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
	                    @endif
	                </ul>
	            </div><!--/.nav-collapse -->
	        </div>
	    </div>
	    <section id="home" name="home"></section>
	    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$room->name}}
                    <small>{{$room->type}}</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
            	<div class="google-maps">
				    <div id="map"></div>
				</div>
				</br>
				<div class="row">
					<div class="col-md-6">
						<a target="_blank" class="btn btn-block btn-primary" href="https://www.google.com/maps/dir//{{ $room->object->lng }},{{ $room->object->lat }}/">Prowadź do wejścia</a>
					</div>
					<div class="col-md-6">
						<a class="btn btn-block btn-success" href="http://szukajnapcz.pl/object/{{ $room->object->id }}">Struktura budynku</a>
					</div>
				</div>
            	
            	
            </div>
            <div class="col-md-4">
            	<h2>Budynek:</h2>
                <p>{{ $room->object->name }}</p>
            	<img class="img-responsive" src="{{$room->object->photo ? $room->object->photo->file : 'http://placehold.it/400x200'}}">
                <p>{{ $room->description }}</p>
                <h3>Informacje szczegółowe</h3>
                <ul>
                    <li>Piętro: {{ $room->level }}</li>
                    <li>Lat: {{ $room->object->lat }}</li>
                    <li>Lng: {{ $room->object->lng }}</li>
                </ul>
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Pomieszczenia w tym samym budynku</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Wszystkie prawa zastrzeżone &copy; szukajnapcz.pl 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

   </div>

	
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
<script>
	  function initMap() {
	    var uluru = {lat: {{ $room->object->lng }}, lng: {{ $room->object->lat }}};
	    var map = new google.maps.Map(document.getElementById('map'), {
	      zoom: 17,
	      center: uluru
	    });
	    var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">LOL</h1>'+
            '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
            'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
            '(last visited June 22, 2009).</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          maxWidth: 200
        });

        var marker = new google.maps.Marker({
          position: uluru,
          map: map,
          title: '{{ $room->object->name }}'
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
	  }
	</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3eXJYKGx1HRqvRKpO13qiy13iYcJqS3o&callback=initMap">
    </script>
  </body>
</html>