@extends('admin.template.main')

@section('title','Crear Subscriptor')


@section('content')
	{!! Form::open(['route' => 'admin.subscribers.store','method'=> 'POST']) !!}

		<div class = "form-group">
			{!! Form::label('name','Nombre')!!}
			{!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Nombre Completo','required']) !!}
		</div>
		<div class = "form-group">
			{!! Form::label('email','Correo Electronico')!!}
			{!! Form::text('email',null,['class' => 'form-control','placeholder' => 'example@example.com','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update',['class' => 'btn btn-primary'])!!}
		</div>

	{!! Form::close() !!}

@endsection