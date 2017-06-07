@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="box box-default">
			  <div class="box-header with-border">
			    <h3 class="box-title">Logowanie</h3>
			    <div class="box-tools pull-right">
			      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			    </div><!-- /.box-tools -->
			  </div><!-- /.box-header -->
			  <div class="box-body">
			    {{ trans('adminlte_lang::message.logged') }}
			  </div><!-- /.box-body -->
			</div><!-- /.box -->
		</div class="row">
	</div>
@endsection
