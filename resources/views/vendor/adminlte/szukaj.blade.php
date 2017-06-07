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
<body>
	  <header>
	    <div id="search-input"></div>
	  </header>
  	<main>
	  <div id="left-column">
        <div id="type" class="facet"></div>
        <div id="user_id" class="facet"></div>
      </div>
	  <div id="right-column">
	    <div id="sort-by-wrapper"><span id="sort-by"></span></div>
	    <div id="stats"></div>
	    <div id="hits"></div>
	    <div id="pagination"></div>
	  </div>
	</main>

	<script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
	<script src="js/app.js"></script>

	<script type="text/html" id="hit-template">
	  <div class="hit">
	    <div class="hit-content">
	      <h3 class="hit-name">@{{name}}</h3>
	      <h2 class="hit-description">@{{desciption}}</h2>
	      <h2 class="hit-url">@{{url}}</h2>
	      <h2 class="hit-type">@{{type}}</h2>
	    </div>
	  </div>
	</script>

	<script type="text/html" id="no-results-template">
	  <div id="no-results-message">
	    <p>Nie znaleziono żadnego wyniku <em>"@{{query}}"</em>.</p>
	    <a href="." class="clear-all">Wyczyść wyszukiwanie</a>
	  </div>
	</script>


	
	<script src="js/search.js"></script>
  </body>
</html>