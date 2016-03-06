@extends('admin.template.main')

@section('title','Crear usuario')


@section('content')
	{!! Form::open(['method' => 'put','route' => ['admin.services.update',$service->id]]) !!}
		<div class = "form-group">
			{!! Form::label('name','Nombre')!!}
			{!! Form::text('name',null,['class' => 'form-control','placeholder' => $service->name,'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description','Description')!!}
			{!! Form::text('description',null,['class' => 'form-control', 'placeholder' => $service->description,'required'])!!}
		</div>
		<div class="form-group">
			{!! Form::label('status','Status')!!}
			{!! Form::select('status',['Operational' => 'Operational','Non-Operational'=> 'Non-Operational'],null,
			['class' => 'form-control', 'placeholder' => 'Choice one option...','required'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update',['class' => 'btn btn-primary'])!!}
		</div>

	{!! Form::close() !!}

@endsection