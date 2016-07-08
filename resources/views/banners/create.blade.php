@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') New banner @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
		@include('alerts.allAlerts')
		<h4>Solicitar Banner </h4>
		<div class="row">
			{!!Form::open(['route'=>'banners.store', 'method'=>'POST'])!!}
			@include('banners.forms.fieldsBanner')
				<div class="list-group">
					<div class="list-group-item">
						<h4>Todos los campos son requeridos</h4>
					</div>
			<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">							
							{!!Form::label('Registrar')!!}						
							{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;'])!!}

							{!!Form::close()!!}

					</div>
					</div>
				</div>
			</div><!--Este fin del div cierra el div que se abre en fieldsUser-->	
		</div>
	</div>
@stop

