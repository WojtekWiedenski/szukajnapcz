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
              <h3 class="box-title">Lista zdjęć</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            @if($photos)
              <table class="table table-hover">
                <tbody><tr>
                  <th>Id</th>
                  <th>Nazwa</th>
                  <th>Utworzono</th>
                  <th>Edytuj</th>
                  <th>Usuń</th>
                </tr>
            @foreach($photos as $photo)
                <tr>
                  <td>{{ $photo->id }}</td>
                  <td><img height="100" src="{{ $photo->file }}"></td>
                  <td>{{ $photo->created_at ? $photo->created_at : 'Brak daty' }}</td>
                  <td>
                    <a class="btn btn-block btn-primary" href="obiekty/{{ $photo->id }}/edit"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                      {{Form::button('<i class="fa fa-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
                    {!! Form::close() !!}
                  </td>
                </tr>
            @endforeach
              
              </tbody>
              </table>
            @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	</div>
@endsection
