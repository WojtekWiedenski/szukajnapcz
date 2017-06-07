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
              <h3 class="box-title">Dodane aktualności</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Id</th>
                  <th>Zdjęcie</th>
                  <th>Tytuł</th>
                  <th>Treść</th>
                  <th>Kategoria</th>
                  <th>Dodał</th>
                  <th>Utworzono</th>
                  <th>Modyfikowano</th>
                  <th></th>
                  <th></th>
                </tr>
            @foreach($posts as $post)
              <tr>
                  <td>{{$post->id}}</td>
                  <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->body}}</td>
                  <td>{{$post->category ? $post->category->name : 'Bez kategorii'}}</td>
                  <td>{{$post->user->name}}</td>
                  <td>{{$post->created_at->diffForhumans()}}</td>
                  <td>{{$post->updated_at->diffForhumans()}}</td>
                  <td>
                    <a class="btn btn-block btn-primary" href="posts/{{ $post->id }}/edit"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                      {{Form::button('<i class="fa fa-remove"></i>', array('type' => 'submit', 'class' => 'btn btn-block btn-danger'))}}
                    {!! Form::close() !!}
                  </td>
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
