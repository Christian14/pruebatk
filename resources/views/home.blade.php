@extends('layouts.app')

@section('content')
    <div class="page-header text-center">
        <h1>System status <small>Prueba tecnica</small></h1>
    </div>
    <table class="table table-striped">
        <thead>
            <th>Nombre</th>
            <th>Status</th>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{$service->name}}</td>
                    <td>{{$service->status}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="list-group">
        @foreach($incidents as $incident)
        <a href="#" class="list-group-item ">
            <h4 class="list-group-item-heading">
            {{$incident->title}} . {{date('F d, Y', strtotime($incident->created_at))}}</h4>
            <p class="list-group-item-text">{{$incident->description}}</p>
        </a>
        @endforeach
    </div>
    <div>
        {{$incidents->render()}}
    </div>
@endsection
