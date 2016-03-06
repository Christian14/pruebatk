@extends('admin.template.main')

@section('title', 'Incidents')

@section('content')
	<hr>
 	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Title</th>
			<th>Description</th>
			<th>Service</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($incidents as $inc)
				<tr>
					<td>{{$inc->id}}</td>
					<td>{{$inc->title}}</td>
					<td>{{$inc->description}}</td>
					<td>{{$inc->service->name}}</td>
					<td><a href="{{ route('admin.incidents.edit',$inc->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
					<a href="{{ route('admin.incidents.destroy',$inc->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div>
		{!! $incidents->render()!!}
	</div>
@endsection