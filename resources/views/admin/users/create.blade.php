@extends('admin.template.main')

@section('title','Crear usuario')


@section('content')

	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(['route' => 'admin.users.store','method'=> 'POST']) !!}
		<div class = "form-group">
			{!! Form::label('name','Nombre')!!}
			{!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Nombre Completo','required']) !!}
		</div>
		<div class = "form-group">
			{!! Form::label('email','Correo Electronico')!!}
			{!! Form::text('email',null,['class' => 'form-control','placeholder' => 'example@example.com','required']) !!}
		</div>

		<div class = "form-group">
			{!! Form::label('password','Contraseña')!!}
			{!! Form::password('password',['class' => 'form-control','placeholder' => '**************','required']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('type','Type')!!}
			{!! Form::select('type',['subscriber' => 'Subscriber','admin'=> 'Administrador'],
				null,['class' => 'form-control', 'placeholder' => 'Choice one option...','required'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Registrar',['class' => 'btn btn-primary'])!!}
			
		</div>

	{!! Form::close() !!}

@endsection