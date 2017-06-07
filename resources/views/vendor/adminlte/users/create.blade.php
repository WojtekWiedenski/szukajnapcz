@extends('adminlte::layouts.app')

@section('htmlheader_title')
  {{ trans('adminlte_lang::message.home') }}
@endsection

@section('main-content')
  <div class="container-fluid spark-screen">
    <div class="row box box-warning">
      @if ( $user->isEmployee('admin') ) 
        @if(count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <!--{!! Form::open(['url'=>'users']) !!}-->
        {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}
        <div class="col-md-8 col-md-offset-2">

            <div class="box-header with-border">
              <h3 class="box-title">Dodawanie nowego użytkownika</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
                <div class="form-group">
                  {!! Form::label('first_name','Imię') !!}
                 {!! Form::text('first_name', null,['class'=>'form-control', 'placeholder'=>'Imię']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('last_name','Nazwisko') !!}
                 {!! Form::text('last_name', null,['class'=>'form-control', 'placeholder'=>'Nazwisko']) !!}
                </div>
                <!-- text input -->
                <div class="form-group">
                  {!! Form::label('name','Nick') !!}
                  {!! Form::text('name', null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('email','E-mail') !!}
                  {!! Form::text('email', null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('password','Hasło') !!}
                 {!! Form::password('password', null,['class'=>'form-control', 'placeholder'=>'Podaj hasło ...']) !!}
                </div>
              
                <div class="box-footer">
                  {!! Form::submit('Dodaj użytkownika',['class'=>'btn btn-primary pull-right']) !!}
                </div>
                
              </div>
              <!-- /.box-body -->

          
        </div>
        
      @elseif ( $user->isEmployee('editor') ) 
        <p>Masz uprawnienia edytora</p>
      @else
        <p>Nie masz uprawnien do tego bloku.</p>
      @endif
      </div>
  </div> <!--- end container -->
@endsection


 