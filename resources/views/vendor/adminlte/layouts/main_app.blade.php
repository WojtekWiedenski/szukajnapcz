<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

 <style>
      html,
      body {
        font-family: Arial, sans-serif;
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .container {
        height: 100%;
        position: relative;
      }

      input {
        font-size: 12px;
      }

      h1 {
        color: #525454;
        font-size: 22px;
        margin: 0 0 10px 0;
        text-align: center;
      }

      #hide-listings,
      #show-listings {
        width: 48%;
      }

      hr {
        background: #D0D7D9;
        height: 1px;
        margin: 20px 0 20px 0;
        border: none;
      }

      #map {
        bottom:0px;
        height: 100%;
        left: 0;
        position: relative;
        right: 0px;
      }

      .options-box {
        background: #fff;
        border: 1px solid #999;
        border-radius: 3px;
        height: 100%;
        line-height: 35px;
        padding: 10px 10px 30px 10px;
        text-align: left;
        width: 340px;
      }

      #pano {
        width: 200px;
        height: 200px;
      }

      #search-within-time-text {
        width: 84%;
      }

      .text {
        font-size: 12px;
      }

      #toggle-drawing {
        width: 27%;
        position: relative;
        margin-left: 10px;
      }

      #zoom-to-area-text {
        width: 70%;
      }

      #zoom-to-area {
        width: 24%;
      }
    </style>

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue layout-top-nav">
<div id="app">
    <div class="wrapper">

    @include('adminlte::layouts.partials.mainheader')

    @include('adminlte::layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section>
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('adminlte::layouts.partials.controlsidebar')

    @include('adminlte::layouts.partials.footer')

</div><!-- ./wrapper -->
</div>
@section('scripts')
    @include('adminlte::layouts.partials.scripts2')
@show

</body>
</html>
