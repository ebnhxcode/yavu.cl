@section('favicon') {!!Html::favicon('favicons/admin.png')!!} @stop
@section('title') New admin @stop
@extends('layouts.frontadm')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
	<!--<h1>Registro de Admins</h1>-->
	</div>
	<div id="contentIn">
		@include('alerts.allAlerts')
		

		{!!Form::open(['route'=>'admins.store', 'method'=>'POST'])!!}
			@include('admins.forms.fieldsAdmin')
			{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success'])!!}
		{!!Form::close()!!}
		
	</div>
</div>
@stop