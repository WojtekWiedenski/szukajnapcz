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
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-newspaper-o"></i>
                <span>Blog</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu menu-open" style="display: block;">
                <li><a href="{{url('posts')}}"><i class="fa fa-calendar-plus-o"></i> Dodaj artykuł</a></li>
                <li><a href="{{url('posts')}}"><i class="fa fa-list-ul"></i> Lista artykułów</a></li>
              </ul>
            </li>


            <li><a href="{{url('posts')}}"><i class="fa fa-newspaper-o"></i> <span>Blog</span></a></li>
            <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="{{url('obiekty')}}"><i class="fa fa-home"></i> <span>Obiekty</span></a></li>
            <li><a href="{{url('users')}}"><i class="fa fa-users"></i> <span>Użytkownicy</span></a></li>
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>Lista punktów</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>Dodaj punkt</span></a></li>
        </ul><!-- /.sidebar-menu -->

        <div>
          <input id="show-listings" type="button" value="Show Listings">
          <input id="hide-listings" type="button" value="Hide Listings">
        </div>

        <input id="pac-input" type="text" placeholder="Search Box"/>

    </section>
    <!-- /.sidebar -->

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
        click: function(e) {
          alert('You clicked '+val.name+' in this marker');
        }
        });
    });

  </script>
</aside>
