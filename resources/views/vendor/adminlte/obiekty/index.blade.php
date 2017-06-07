@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">

  @if ( Session::has('object_created'))
   <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> {{ Session::get('object_created') }}</h4>
    </div>
  @endif
  @if ( Session::has('object_destroyed'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-ban"></i> {{ Session::get('object_destroyed') }}</h4>
  </div>
  @endif

  

		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista obiektów</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <a class="btn btn-block btn-primary" href="obiekty/dodaj">Dodaj obiekt</a>
                  <!---<input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> 
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                  -->
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Nazwa</th>
                  <th>Zdjęcie</th>
                 <!--- <th>Opis</th> -->
                  <th>Adres</th>
                  <th>Rodzaj</th>
                  <th>Lista pomieszczeń</th>
                  <th>Dodał</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
            @foreach($objects as $object)
                <tr>
                  <td>{{ $object->name }}</td>
                  <td><img height="50" src="{{$object->photo ? $object->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                 <!-- <td>{{ $object->description }}</td> -->
                  <td>{{ $object->adress }}</td>
                  <td>{{ $object->type }}</td>
                  <td><ul>
                     @foreach ($object->rooms as $room)
                      <li>{{$room->number}}</li>
                     @endforeach
                     </ul>
                  </td>
                  <td>{{ $object->user->name }}</td>
                  <td>
                    <a class="btn btn-block btn-primary" href="{{ $object->url }}"><i class="fa fa-globe"></i></a>
                  </td>
                  <td>
                    <a class="btn btn-block btn-primary" href="obiekty/{{ $object->id }}/edit"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['ObjectsController@destroy', $object->id]]) !!}
                      {{Form::button('<i class="fa fa-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
                    {!! Form::close() !!}
                  </td>
                </tr>
            @endforeach
              
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	</div>
@endsection
