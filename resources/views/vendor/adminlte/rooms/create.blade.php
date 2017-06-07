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
              <h3 class="box-title">Dodaj newsa</h3>
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
                {!! Form::open(['method'=>'POST', 'action'=>'RoomsController@store', 'files'=>true]) !!}
                  <div class="box box-warning box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Wybierz budynek</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    
                    <div class="form-group">
                    {!! Form::label('object_id','Jeżeli nie ma na liście poszukiwanego budynku utwórz go przechodząc do zakładki Obiekty -> Dodaj obiekt.') !!}
                    {!! Form::select('object_id', [''=>'Wybierz obiekt'] + $objects, null, ['class'=>'form-control']) !!}
                  </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                  
                  <div class="form-group">
                    {!! Form::label('name','Nazwa pomieszczenia') !!}
                    {!! Form::text('name', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="row">
                    <div class="col-md-4 form-group">
                      {!! Form::label('type','Rodzaj') !!}
                      {!! Form::select('type', ['Brak' => 'Brak', 'Sala wykładowa' => 'Sala wykładowa','Laboratorium' => 'Laboratorium'],null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-4 form-group">
                      {!! Form::label('number','Numer sali/laboratorium na drzwiach') !!}
                      {!! Form::number('number', null,['class'=>'form-control']) !!}
                    </div>
                    <div class="col-md-4 form-group">
                      {!! Form::label('level','Piętro (jeżeli parter wpisz: 0)') !!}
                      {!! Form::number('level', null,['class'=>'form-control', 'placeholder'=>'Domyślnie parter']) !!}
                    </div> 
                  </div>
  
                  <div class="form-group">
                    {!! Form::label('description','Opis pomieszczenia') !!}
                    {!! Form::textarea('description', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="box-footer">
                    {!! Form::submit('Dodaj pomieszczenie',['class'=>'btn btn-primary pull-right']) !!}
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
