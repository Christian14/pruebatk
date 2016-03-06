@extends('admin.template.main')

@section('title', 'Servicios')

@section('content')
	<a href="{{ route('admin.services.create') }}" class="btn btn-info">Register new service</a><hr>
 	<table class="table table-striped">
		<thead>
			<th>ID</th>
			<th>Nombre</th>
			<th>Description</th>
			<th>Status</th>
			<th>Action</th>
			<th>Join</th>
		</thead>
		<tbody>
			@for($j = 0; $j < $data["services"]->count() ; $j++)
					<tr>
						<td>{{$data["services"][$j]->id}}</td>
						<td>{{$data["services"][$j]->name}}</td>
						<td>{{$data["services"][$j]->description}}</td>
						<td>{{$data["services"][$j]->status}}</td>
						<td><a href="{{ route('admin.services.edit',$data["services"][$j]->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
						<a href="{{ route('admin.services.destroy',$data["services"][$j]->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						<a href="{{ route('admin.incidents.create',$data["services"][$j]->id)}}" class="btn btn-info">Incident  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
						<a href="{{ route('admin.incidents.show',$data["services"][$j]->id)}}" class="btn btn-info">Incidents  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
						<a href="{{ route('admin.services.join',$data["services"][$j]->id)}}" class="btn btn-info">Join  <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
						</td>
						<td>
						@if($data["userServ"]->count() == 0)
							<a class= "btn btn-success"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></a>
						@else
							@for($i=0; $i < $data["userServ"]->count() ; $i++)
								@if($data["services"][$j]->id == $data["userServ"][$i]->id)
									<a class = "btn btn-success"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> </a>
								@else
									<a class= "btn btn-success"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></a>
								@endif
							@endfor
						@endif
						</td>
					</tr>
			@endfor
		</tbody>
	</table>
	<div>
		{!! $data["services"]->render()!!}
	</div>
@endsection