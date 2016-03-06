@extends('admin.template.main')

@section('title','Create Incident')


@section('content')
	{!! Form::open(['route' => 'admin.incidents.store','method' => 'POST']) !!}
		<div class = "form-group">
			{!! Form::label('title','Title')!!}
			{!! Form::text('title',null,['class' => 'form-control','placeholder' => 'Nombre Completo','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description','Description')!!}
			{!! Form::text('description',null,['class' => 'form-control', 'placeholder' => 'description','required'])!!}
		</div>

		<div class="form-group">
			{!! Form::label('service','Service')!!}
			{!! Form::text('service',null,['class' => 'form-control', 'placeholder' => $id,'required'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Register',['class' => 'btn btn-primary'])!!}
		</div>

	{!! Form::close() !!}

@endsection