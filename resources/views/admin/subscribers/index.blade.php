@extends('admin.template.main')

@section('title', 'Subscriptores')

@section('content')
	<a href="{{ route('admin.subscribers.create') }}" class="btn btn-info">Registrar nuevo subscriptor</a><hr>
 	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Accion</th>
		</thead>
		<tbody>
			@foreach($subscribers as $sub)
				<tr>
					<td>{{$sub->id}}</td>
					<td>{{$sub->name}}</td>
					<td>{{$sub->email}}</td>
					<td><a href="{{ route('admin.subscribers.edit',$sub->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
					<a href="{{ route('admin.subscribers.destroy',$sub->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		{!! $subscribers->render()!!}
	</div>
@endsection