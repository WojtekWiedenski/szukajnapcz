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
                {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
                  <div class="form-group">
                    {!! Form::label('title','Tytuł') !!}
                    {!! Form::text('title', null,['class'=>'form-control', 'placeholder'=>'Tytuł newsa']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('category_id','Kategoria') !!}
                    {!! Form::select('category_id', [''=>'Wybierz kategorię'] + $categories, null, ['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('photo_id','Zdjęcie:') !!}
                    {!! Form::file('photo_id', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('body','Treść newsa') !!}
                    {!! Form::textarea('body', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="box-footer">
                    {!! Form::submit('Dodaj news',['class'=>'btn btn-primary pull-right']) !!}
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
