@extends('admin.template.main')

@section('title','Crear usuario')


@section('content')
	{!! Form::open(['method'=> 'put','route' => ['admin.users.update',$user->id]]) !!}
		<div class = "form-group">
			{!! Form::label('name','Nombre')!!}
			{!! Form::text('name',null,['class' => 'form-control','placeholder' => $user->name,'required']) !!}
		</div>
		<div class = "form-group">
			{!! Form::label('email','Correo Electronico')!!}
			{!! Form::text('email',null,['class' => 'form-control','placeholder' => $user->email,'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('type','Type')!!}
			{!! Form::select('type',['subscriber' => 'Subscriber','admin'=> 'Administrador'],
				null,['class' => 'form-control', 'placeholder' => 'Choice one option...','required'])!!}
		</div>
		
		<div class="form-group">
			{!! Form::submit('Update',['class' => 'btn btn-primary'])!!}
			
		</div>


	{!! Form::close() !!}

@endsection