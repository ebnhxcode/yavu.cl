@section('favicon') {!!Html::favicon('favicons/admin.png')!!} @stop
@section('title') New admin @stop
@extends('layouts.frontadm')
@section('content')
<div class="jumbotron">
	<div class="contentMiddle">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				@include('alerts.allAlerts')
			</div><!-- /div .col-xs12-sm12-md12-lg12 -->

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				@include('admins.indexPartial.sectionLeft')
			</div><!-- /div .col-xs12-sm12-md3-lg3 -->

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="list-group">
					<div class="list-group-item">
						REGISTRO DE ADMINISTRADORES
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						{!!Form::open(['route'=>'admins.store', 'method'=>'POST'])!!}
						@include('admins.forms.fieldsAdmin')
						{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success'])!!}
						{!!Form::close()!!}
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
			</div><!-- /div .col-xs12-sm12-md6-lg6 -->

			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				@include('admins.indexPartial.sectionRight')
			</div><!-- /div .col-xs12-sm12-md3-lg3 -->
		</div><!-- /div .row -->
	</div><!-- /div .contentMiddle -->
</div><!-- /div .jumbotron -->
@stop