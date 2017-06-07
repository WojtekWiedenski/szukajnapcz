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
               <div class="col-sm-3">
                  {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
                  <div class="form-group">
                    {!! Form::label('name','Nazwa') !!}
                    {!! Form::text('name', null,['class'=>'form-control']) !!}
                  </div>
                  <div class="box-footer">
                    {!! Form::submit('Dodaj kategorię',['class'=>'btn btn-primary pull-right']) !!}
                  </div>
                {!! Form::close() !!}
               </div>
               <div class="col-sm-9">
                 @if($categories) 
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Utworzono</th>
                      <th>Modyfikowano</th>
                      <th></th>
                      <th></th>
                    </tr>
                @foreach($categories as $category)
                  <tr>
                      <td>{{$category->id}}</td>
                      <td>{{$category->name}}</td>
                       <td>{{$category->created_at->diffForhumans()}}</td>
                      <td>{{$category->updated_at->diffForhumans()}}</td>
                      <td>
                        <a class="btn btn-block btn-primary" href="categories/{{ $category->id }}/edit"><i class="fa fa-edit"></i></a>
                      </td>
                      <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}
                          {{Form::button('<i class="fa fa-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
                        {!! Form::close() !!}
                      </td>
                    </tr>
                @endforeach
                  
                  </tbody>
                </table>
                @endif
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	</div>
@endsection
