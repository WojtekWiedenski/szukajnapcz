  

@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection

<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map-canvas {
        height: 350px;
        width: 100%;
      }
      
</style>

@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row box box-warning">
        
        @if(count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <!-- Metoda PATCH uzywana jest wtedy kiedy aktualizujemy jakis zasob -->
        {!! Form::model($object, ['method'=>'PATCH', 'action'=>['ObjectsController@update', $object->id], 'files'=>true]) !!}
        <div class="col-md-6">
          
            <div class="box-header with-border">
              <h3 class="box-title">Tworzenie nowego obiektu</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">

                <img src="{{$object->photo ? $object->photo->file : 'http://placehold.it/400x200'}}" class="img-responsive">
                <br/>

                <div class="form-group">
                  {!! Form::label('photo_id','Zdjęcie budynku') !!}
                  {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('type','Wybierz rodzaj obiektu') !!}
                  {!! Form::select('type', [
                  'domy-studenckie' => 'Dom studencki', 
                  'przystanki-tramwajowe' => 'Przystanek tramwajowy',
                  'przystanki-autobusowe' => 'Przystanek autobusowy',
                  'wydzialy' => 'Wydział',
                  'rektoraty' => 'Rektorat',
                  'biblioteki' => 'Biblioteka',
                  'punkty-gastronomiczne' => 'Punkt gastronomiczny',
                  'rozrywka' => 'Rozrywka'

                  ],null, ['class'=>'form-control']) !!}
                </div>
                <!-- text input -->
                <div class="form-group">
                  {!! Form::label('name','Nazwa') !!}
                  {!! Form::text('name', null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('url','Url') !!}
                 {!! Form::text('url', null,['class'=>'form-control', 'placeholder'=>'Wpisz adres www ...']) !!}
                </div>

                <div class="form-group">
                  {!! Form::label('adress','Adres korespondencyjny') !!}
                  {!! Form::text('adress', null,['class'=>'form-control', 'placeholder'=>'Adres...']) !!}
                </div>

                <!-- textarea -->
                <div class="form-group">
                  {!! Form::label('description','Opis') !!}
                  {!! Form::textarea('description', null,['class'=>'form-control', 'rows'=>'3', 'placeholder'=>'Wpisz krótki opis obiektu ...']) !!}
                </div>
                
              </div>
              <!-- /.box-body -->

          
        </div>
        <div class="col-md-6">
            <div class="box-header with-border">
              <h3 class="box-title">Zaznacz obiekt na mapie</h3>
            </div>
            <div class="form-group">
                  <label for="">Przesuń pinezkę w wybraną lokalizację</label>
              <!--    <input type="text" id="searchmap"> -->
                  <div id="map-canvas"></div>
                </div>
                <div class="form-group">
                  {!! Form::label('geo','Położenie geograficzne') !!}
                  <div class="row">
                    <div class="col-md-6">
                    {!! Form::text('lat', null,['id'=>'lng','class'=>'form-control', 'placeholder'=>'Szerkość geograficzna']) !!}
                    </div>
                    <div class="col-md-6">
                      {!! Form::text('lng', null,['id'=>'lat', 'class'=>'form-control', 'placeholder'=>'Długość geograficzna']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  {!! Form::label('wA','Wierzchołek A') !!}
                  <div class="row">
                    <div class="col-md-6">
                    {!! Form::text('clng0', null,['id'=>'clng0','class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                      {!! Form::text('clat0', null,['id'=>'clat0', 'class'=>'form-control']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  {!! Form::label('wB','Wierzchołek B') !!}
                  <div class="row">
                    <div class="col-md-6">
                    {!! Form::text('clng1', null,['id'=>'clng1','class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                      {!! Form::text('clat1', null,['id'=>'clat1', 'class'=>'form-control']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  {!! Form::label('wC','Wierzchołek C') !!}
                  <div class="row">
                    <div class="col-md-6">
                    {!! Form::text('clng2', null,['id'=>'clng2','class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                      {!! Form::text('clat2', null,['id'=>'clat2', 'class'=>'form-control']) !!}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  {!! Form::label('wC','Wierzchołek D') !!}
                  <div class="row">
                    <div class="col-md-6">
                    {!! Form::text('clng3', null,['id'=>'clng3','class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                      {!! Form::text('clat3', null,['id'=>'clat3', 'class'=>'form-control']) !!}
                    </div>
                  </div>
                </div>
      </div> <!--- end row -->
        <div class="box-footer">
                  {!! Form::submit('Dodaj obiekt',['class'=>'btn btn-primary pull-right']) !!}
              </div>
  </div> <!--- end container -->

    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: {{$object->lng}}, lng: {{$object->lat}}},
          zoom: 17
        });
        var marker = new google.maps.Marker({
          position: {
            lat: {{$object->lng}},
            lng: {{$object->lat}}
          },
          map: map,
          draggable: true
        });

        // Define the LatLng coordinates for the polygon.
        var objectsCorners = [
            {lat: {{$object->clat0}}, lng: {{$object->clng0}} },
            {lat: {{$object->clat1}}, lng: {{$object->clng1}} },
            {lat: {{$object->clat2}}, lng: {{$object->clng2}} },
            {lat: {{$object->clat3}}, lng: {{$object->clng3}} }
        ];

        // Construct the polygon.
        var bermudaTriangle = new google.maps.Polygon({
          paths: objectsCorners,
          strokeColor: '#FF0000',
          strokeOpacity: 0.8,
          strokeWeight: 3,
          fillColor: '#FF0000',
          fillOpacity: 0.35,
          draggable: true,
          editable: true
        });
        
        bermudaTriangle.setMap(map);

        // Add a listener for the click event.
        bermudaTriangle.addListener('click', showArrays);

        // Add a listener for the click event.
        bermudaTriangle.addListener('click', przekazDane);

        infoWindow = new google.maps.InfoWindow;
        /*
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        
        google.maps.event.addListener(searchBox,'places_changed',function(){
          var places = searchBox.getPlaces();
          var bounds = new google.maps.LatLngBounds();
          var i, place;
          for(i=0; place=places[i];i++){
              bounds.extend(place.geometry.location);
              marker.setPosition(place.geometry.location); //set marker position new...
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
        */
        google.maps.event.addListener(marker,'position_changed',function(){
          var lat = marker.getPosition().lat();
          var lng = marker.getPosition().lng();
          $('#lat').val(lat);
          $('#lng').val(lng);
        });

        var infowindow = new google.maps.InfoWindow({
          content: '<p>Marker Location:' + marker.getPosition() + '</p>'
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(map, marker);
        });

      }

        function przekazDane(event) {

        var bermudaTriangle = this.getPath();

        // Iterate over the vertices.
        for (var i =0; i < bermudaTriangle.getLength(); i++) {
          var xy = bermudaTriangle.getAt(i);
          //contentString += '<br>' + 'Coordinate ' + i + ':<br>' + xy.lat() + ',' + xy.lng();

          var lat = xy.lat();
          var lng = xy.lng();
          $('#clat'+i).val(lat);
          $('#clng'+i).val(lng);

        } /*end petli for */

      }
    </script>
@endsection


 