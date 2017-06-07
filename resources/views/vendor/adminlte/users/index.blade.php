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
              <h3 class="box-title">Zarejestrowani używtkownicy</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Zdjęcie</th>
                  <th>Login</th>
                  <th>E-mail</th>
                  <th>Rola</th>
                  <th>Status</th>
                  <th>Utworzono</th>
                  <th>Modyfikowano</th>
                </tr>
            @foreach($users as $user)
                
                <tr>
                    <td><img src="{{ Gravatar::get($user->email) }}" alt="User Image" width="40px"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>---</td>
                    <td>{{ $user->is_active==1 ? 'On-line' : 'Off-line' }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>{{ $user->updated_at->diffForHumans() }}</td>
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
