@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">

		<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista pomieszczeń</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <a class="btn btn-block btn-primary" href="rooms/create">Dodaj pomieszczenie</a>
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
                  <th>Opis</th>
                  <th>Rodzaj</th>
                  <th>Piętro</th>
                  <th>Bydynek</th>
                  <th>Dodał</th>
                  <th></th>
                  <th></th>
                </tr>
            @foreach($rooms as $room)
                <tr>
                  <td>{{ $room->name }}</td>
                  <td>{{ $room->description }}</td>
                  <td>{{ $room->object->name }}</td>
                  <td>{{ $room->level }}</td>
                  <td>{{ $room->user->first_name }}</td>
                  <td>{{ $room->user->name }}</td>
                  <td>
                    <a class="btn btn-block btn-primary" href="rooms/{{ $room->id }}/edit"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['RoomsController@destroy', $room->id]]) !!}
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
