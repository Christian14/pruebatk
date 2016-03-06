@extends('layouts.app')

@section('content')
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
        @if(Auth::guest())
        @else
            <div class="form-group">
                {!! Form::label('type','Type')!!}
                {!! Form::select('type',['subscriber' => 'Subscriber','admin'=> 'Administrador'],
                    null,['class' => 'form-control', 'placeholder' => 'Choice one option...','required'])!!}
            </div>
        @endif
        <div class="form-group">
            {!! Form::submit('Registrar',['class' => 'btn btn-primary'])!!}
            
        </div>

    {!! Form::close() !!}
@endsection
