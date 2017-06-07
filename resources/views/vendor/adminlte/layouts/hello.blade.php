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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">
    <link rel="stylesheet" type="text/css" href="css/search.css">

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
	                    <li class="active"><a href="#home" class="smoothScroll">Strona główna</a></li>
	                    <li><a href="#desc" class="smoothScroll">Blog</a></li>
	                    <!--<li><a href="#showcase" class="smoothScroll">Funkcje projektu</a></li>-->
	                    <li><a href="#contact" class="smoothScroll">Kontakt</a></li>
	                </ul>
	                <ul class="nav navbar-nav navbar-right">
	                    @if (Auth::guest())
	                        <li><a href="{{ url('/login') }}">Zaloguj się</a></li>
	                        <li><a href="{{ url('/register') }}">Rejestracja</a></li>
	                    @else
	                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
	                    @endif
	                </ul>
	            </div><!--/.nav-collapse -->
	        </div>
	    </div>

      <section id="home" name="home"></section>
    <div>
        <div class="container">
            <div class="row centered">
               <div class="col-lg-12">

                   <h1>Miasteczko <b><a href="https://pcz.pl">PCz</a></b></h1>
                   <h3>Nie wiesz gdzie jest twoja sala wykładowa lub laboratorium?</h3>
                    <!--
                   <h3>Sklepy, biblioteki, rozkład jazdy autobusów, sale wykładowe.</br>wszystko w jednym miejscu. Po prostu zacznij szukać...</h3>
                   -->
                
                <header>
                    <div id="search-input"></div>
                  </header>
                <main>
                
                  <div id="column">
                    <div id="type" class="facet"></div>
                    <div id="user_id" class="facet"></div>
                  </div>
                
                  <div id="center-column">
                    <div id="sort-by-wrapper"><span id="sort-by"></span></div>
                    <div id="stats"></div>
                    <div id="hits"></div>
                    <div id="pagination"></div>
                  </div>
                </main>
               </div>
            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->
          <!-- Page Content -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Wszystkie prawa zastrzeżone &copy; szukajnapcz.pl 2017</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>



	    
		

   </div> <!-- end app -->

	<script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
	<script src="js/app.js"></script>

	<script type="text/html" id="hit-template">
    <!-- Project One -->
        <div class="row">
            <div class="col-md-4">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/400x200" alt="">
                </a>
            </div>
            <div class="col-md-8">
                <h3>@{{name}}</a></h3>
                <h4>@{{type}}</h4>
                <p>@{{description}}</p>
                <a class="btn btn-primary" href="room/@{{id}}">Jak dotrzeć <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->
        <hr>
	</script>

	<script type="text/html" id="no-results-template">
	  <div id="no-results-message">
	    <p>Nie znaleziono żadnego wyniku <em>"@{{query}}"</em>.</p>
	    <a href="." class="clear-all">Wyczyść wyszukiwanie</a>
	  </div>
	</script>


	
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
<script src="js/search.js"></script>
  </body>
</html>