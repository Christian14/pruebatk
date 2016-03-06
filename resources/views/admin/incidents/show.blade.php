@extends('admin.template.main')

@section('title', 'Incidents')

@section('content')
	<hr>
 	<table class="table table-striped">
		<thead>
			<th>Title</th>
			<th>Description</th>
			<th>Action</th>
		</thead>
		<tbody>
			@foreach($service->incidents as $inc)
				<tr>
					<td>{{$inc->title}}</td>
					<td>{{$inc->description}}</td>
					<td><a href="{{ route('admin.incidents.edit',$inc->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
					<a href="{{ route('admin.incidents.destroy',$inc->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>	
@endsection