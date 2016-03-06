@extends('admin.template.main')

@section('title','Crear usuario')


@section('content')
	{!! Form::open(['method'=>'put','route' => ['admin.incidents.update',$incident->id]]) !!}
		<div class = "form-group">
			{!! Form::label('title','Title')!!}
			{!! Form::text('title',null,['class' => 'form-control','placeholder' => $incident->title,'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description','Description')!!}
			{!! Form::text('description',null,['class' => 'form-control', 'placeholder' => $incident->description,'required'])!!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update',['class' => 'btn btn-primary'])!!}
		</div>

	{!! Form::close() !!}

@endsection