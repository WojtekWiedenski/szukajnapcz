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
              <h3 class="box-title">Edycja pomieszczenia</h3>
            </div>

            @if(count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                 
                {!! Form::model($rooms, ['method'=>'PATCH', 'action'=>['RoomsController@update', $rooms->id]]) !!}
                 

                  <div class="form-group">
                    {!! Form::label('name','Nazwa obiektu') !!}
                    {!! Form::text('name', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('level','Piętro') !!}
                    {!! Form::number('level', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('type','Rodzaj') !!}
                    {!! Form::select('type', array(2=>'Brak',1=>'Sala wykładowa',0=>'Laboratorium'),['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('description','Opis pomieszczenia') !!}
                    {!! Form::textarea('description', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="box-footer">
                    {!! Form::submit('Edytuj',['class'=>'btn btn-primary pull-right']) !!}
                  </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	</div>
@endsection
