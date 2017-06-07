@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-4">
				<div class="small-box bg-yellow">
	            	<div class="inner">
		              <h3>{{ $count_users }}</h3>

		              <p>Liczba użytkowników</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-users"></i>
		            </div>
		            <a href="#" class="small-box-footer">Dodaj użytkownika <i class="fa fa-arrow-circle-right"></i></a>
	          	</div>
			</div>

			

			<div class="col-md-4">
				<div class="small-box bg-aqua">
		            <div class="inner">
		              <h3>{{ $count_objects }}</h3>

		              <p>Liczba obiektów</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-map-marker"></i>
		            </div>
		            <a href="obiekty/dodaj" class="small-box-footer">Dodaj obiekt <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
			</div>
			<div class="col-md-4">
				<div class="small-box bg-green">
		            <div class="inner">
		              <h3>{{ $count_rooms }}</h3>

		              <p>Liczba pomieszczeń</p>
		            </div>
		            <div class="icon">
		              <i class="fa fa-home"></i>
		            </div>
		            <a href="rooms/create" class="small-box-footer">Dodaj pomieszczenie <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
			</div>
		</div>
		<div class="row">
            <div class="col-md-6">
              <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ostatnio dodane obiekty</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
              @foreach ($objects as $object)	
              	 @continue($object->type == 1)	    
	                <li class="item">
	                  <div class="product-img">
	                    <img src="http://placehold.it/50x50" alt="Product Image">
	                  </div>
	                  <div class="product-info">
	                    <a href="javascript:void(0)" class="product-title">{{ $object->name }}
	                      <span class="label label-warning pull-right">{{ $object->type }}</span></a>
	                        <span class="product-description">{{ $object->description }}</span>
	                        <span class="product-description">Dodane przez: {{ $object->user->name }}</span>
	                  </div>
	                </li>
	                
				         @break($object->number == 5)
				@endforeach
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="obiekty" class="uppercase">Zobacz wszystkie obiekty </a>
            </div>
            <!-- /.box-footer -->
          </div>
            </div>
            <!-- /.col -->

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Ostatnio zarejestrowani</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding" style="display: block;">
                  <ul class="users-list clearfix">
                  @foreach ($users as $user)
                    <li>
                      <img src="{{ Gravatar::get($user->email) }}" alt="User Image">
                      <a class="users-list-name" href="#">{{$user->name}}</a>
                      <span class="users-list-date">{{ $user->created_at->diffForHumans() }}</span>
                    </li>
                  @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center" style="display: block;">
                  <a href="users" class="uppercase">Zobacz wszystkich użytkowników</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          
	</div>
@endsection
