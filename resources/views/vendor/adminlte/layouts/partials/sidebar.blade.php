<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!--
                    <a href="#"><i class="fa fa-circle text-success"></i>{{ Auth::user()->status }}</a>
                    -->
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) 
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
        <!--
            <li class="treeview">
              <a href="obiekty">
                <i class="fa fa-files-o"></i>
                <span>Rodzaje obiektów</span>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">8</span>
                </span>
              </a>
              <ul class="treeview-menu menu-open" style="display: block;">
                <li><a href="layout/top-nav.html"><i class="fa fa-circle-o"></i>Domy studenckie</a></li>
                <li><a href="layout/boxed.html"><i class="fa fa-circle-o"></i>Przystanki autobusowe</a></li>
                <li><a href="layout/fixed.html"><i class="fa fa-circle-o"></i>Przystanki tramwajowe</a></li>
                <li><a href="layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Wydziały</a></li>
                <li><a href="layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Rektorat</a></li>
                <li><a href="layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Biblioteka</a></li>
                <li><a href="layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Punkty gastronomiczne</a></li>
                <li><a href="layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Rozrywka</a></li>
              </ul>
            </li>
        -->
            <li class="header">Funkcje</li>

            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span>Kokpit</span></a></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-newspaper-o"></i>
                <span>Blog</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open">
                <li><a href="{{url('categories')}}"><i class="fa fa-list-ul"></i> Kategorie artykułów</a></li>
                <li><a href="{{url('posts/create')}}"><i class="fa fa-calendar-plus-o"></i> Dodaj artykuł</a></li>
                <li><a href="{{url('posts')}}"><i class="fa fa-list-ul"></i> Lista artykułów</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-map-marker"></i>
                <span>Obiekty</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open">
                <li><a href="{{url('obiekty/create')}}"><i class="fa fa-calendar-plus-o"></i> Dodaj obiekt</a></li>
                <li><a href="{{url('obiekty')}}"><i class="fa fa-list-ul"></i> Lista obiektów</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-home"></i>
                <span>Pomieszczenia</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open">
                <li><a href="{{url('rooms/create')}}"><i class="fa fa-calendar-plus-o"></i> Dodaj pomieszczenie</a></li>
                <li><a href="{{url('rooms')}}"><i class="fa fa-list-ul"></i> Lista pomieszczeń</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Użytkownicy</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open">
                <li><a href="{{url('users/create')}}"><i class="fa fa-calendar-plus-o"></i> Dodaj użytkownika</a></li>
                <li><a href="{{url('users')}}"><i class="fa fa-list-ul"></i> Lista użytkowników</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-picture-o"></i>
                <span>Media</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open">
                <li><a href="{{url('media/create')}}"><i class="fa fa-calendar-plus-o"></i> Dodaj zdjęcie</a></li>
                <li><a href="{{url('media')}}"><i class="fa fa-list-ul"></i> Wszystkie zdjęcia</a></li>
              </ul>
            </li>
            
            <li class="header">Funkcje uzytkownika</li>
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="active"><a href="{{ url('settings/profile') }}"><i class='fa fa-link'></i>Edytuj profil</a></li>
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
