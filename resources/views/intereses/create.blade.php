@section('favicon') {!!Html::favicon('favicons/changeFaviconNameHere.png')!!} @stop
@section('title') New interest @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				@include('alerts.allAlerts')
			</div><!-- /div col-md12-sm12-xs12 -->
			<div class="col-md-8 col-sm-12 col-xs-12">
				{!!Form::open(['route'=>'intereses.store', 'method'=>'POST'])!!}
				@include('intereses.forms.fieldsInteres')
				<div class="list-group">
					<div class="list-group-item">
						<h4>Todos los campos son requeridos</h4>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">			
						<div class="form-group has-feedback has-feedback-left">	
							{!!Form::label('Registrar')!!}		
							{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;'])!!}
							{!!Form::close()!!}
						</div><!-- /div .form-group .has-feedback .has-feedback-left -->
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
			</div><!-- /div .col-md8-sm12-xs12 -->
			<div class="col-md-4 col-sm-12 col-xs-12">
			</div><!-- /div .col-md4-sm12-xs12 -->
		</div><!-- /div .row -->
	</div><!-- /div #contentMiddle -->
</div><!-- /div .jumbotron -->
@stop