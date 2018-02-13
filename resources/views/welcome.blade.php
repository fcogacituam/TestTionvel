@extends('layouts.admin')

@section('content')
    {!! Form::open(['action'=>'WelcomeController@validar','method'=>'POST','name'=>'fechas']) !!}
    	@csrf
		@include("includes.formularios")
		<div class="row">
			<div class="col-md-12">
				{!! Form::submit('Enviar',['class'=>'btn btn-primary btn-center']) !!}
			</div>
		</div>
    {!! Form::close() !!}


@stop
@section('alert')
	@include('alerts.success')
	@include('alerts.request')
	@include('alerts.errors')
@stop

@section('result')
	@include("includes.result")
@stop