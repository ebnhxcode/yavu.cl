@extends('layouts.frontadm')	
@section('content')
<div class="jumbotron">
	<div id="contentIn">
		@include('alerts.alertFields')
		@include('alerts.errorsMessage')
		@include('alerts.successMessage')
		@include('alerts.warningMessage')
		<h2>Panel de administración de banner</h2>		
		<div class="panel panel-default">
			<div class="panel-heading"><h4></h4></div>
			<div class="panel-body">
			</div>
		</div>	

	</div>
</div>
@stop