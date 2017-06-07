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
              <h3 class="box-title">Kategorie</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               <div class="col-sm-6">
                  {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
                  <div class="form-group">
                    {!! Form::label('name','Nazwa') !!}
                    {!! Form::text('name', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="box-footer">
                    {!! Form::submit('Edytuj kategorię',['class'=>'btn btn-primary pull-right']) !!}
                  </div>
                {!! Form::close() !!}
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	</div>
@endsection
