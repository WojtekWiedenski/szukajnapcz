@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-3">
				<div class="info-box">
				  <!-- Apply any bg-* class to to the icon to color it -->
				  <span class="info-box-icon bg-blue"><i class="fa fa-graduation-cup"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Wydziały</span>
				    <span class="info-box-number">7</span>
				  </div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>
			<div class="col-md-3">
				<div class="info-box">
				  <!-- Apply any bg-* class to to the icon to color it -->
				  <span class="info-box-icon bg-red"><i class="fa fa-home"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Domy studenckie</span>
				    <span class="info-box-number">4</span>
				  </div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>
			<div class="col-md-3">
				<div class="info-box">
				  <!-- Apply any bg-* class to to the icon to color it -->
				  <span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Biblioteka</span>
				    <span class="info-box-number">1</span>
				  </div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>
			<div class="col-md-3">
				<div class="info-box">
				  <!-- Apply any bg-* class to to the icon to color it -->
				  <span class="info-box-icon bg-red"><i class="fa fa-cutlery"></i></span>
				  <div class="info-box-content">
				    <span class="info-box-text">Punkty gastronomiczne</span>
				    <span class="info-box-number">14</span>
				  </div><!-- /.info-box-content -->
				</div><!-- /.info-box -->
			</div>
		</div>
	</div>
@endsection
