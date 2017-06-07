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
    <!-- Fixed navbar -->
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
    <div id="headerwrap">
        <div class="container">
            <div class="row centered">
                
                <div class="col-lg-12">
                    <h1>Miasteczko <b><a href="https://pcz.pl">PCz</a></b></h1>
                    <h3>Sklepy, biblioteki, rozkład jazdy autobusów, sale wykładowe.</br>wszystko w jednym miejscu. Po prostu zacznij szukać...</h3>
                </div>

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

                <!---
                <div class="col-lg-2">
                    <h5>{{ trans('adminlte_lang::message.amazing') }}</h5>
                    <p>{{ trans('adminlte_lang::message.basedadminlte') }}</p>
                    <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow1.png') }}">
                </div>
                <div class="col-lg-8">
                    <img class="img-responsive" src="{{ asset('/img/app-bg.png') }}" alt="">
                </div>
                <div class="col-lg-2">
                    <br>
                    <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/img/arrow2.png') }}">
                    <h5>{{ trans('adminlte_lang::message.awesomepackaged') }}</h5>
                    <p>... {{ trans('adminlte_lang::message.by') }} <a href="http://acacha.org/sergitur">Sergi Tur Badenas</a> {{ trans('adminlte_lang::message.at') }} <a href="http://acacha.org">acacha.org</a> {{ trans('adminlte_lang::message.readytouse') }}</p>
                </div>
                -->
            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->


    <section id="desc" name="desc"></section>
    <!-- INTRO WRAP -->

    <section id="contact" name="contact"></section>
    <div id="c">
        <div class="container">
            <p>
                <a href="https://github.com/acacha/adminlte-laravel"></a><b>admin-lte-laravel</b></a>. {{ trans('adminlte_lang::message.descriptionpackage') }}.<br/>
                <strong>Copyright &copy; 2015 <a href="http://acacha.org">Acacha.org</a>.</strong> {{ trans('adminlte_lang::message.createdby') }} <a href="http://acacha.org/sergitur">Sergi Tur Badenas</a>. {{ trans('adminlte_lang::message.seecode') }} <a href="https://github.com/acacha/adminlte-laravel">Github</a>
                <br/>
                AdminLTE {{ trans('adminlte_lang::message.createdby') }} Abdullah Almsaeed <a href="https://almsaeedstudio.com/">almsaeedstudio.com</a>
                <br/>
                 Pratt Landing Page {{ trans('adminlte_lang::message.createdby') }} <a href="http://www.blacktie.co">BLACKTIE.CO</a>
            </p>

        </div>
    </div>
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
<script src="js/search.js"></script>
</body>
</html>
