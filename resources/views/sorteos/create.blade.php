@section('favicon') {!!Html::favicon('favicons/raffle.png')!!} @stop
@section('title') New raffle @stop
@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
    @include('sorteos.forms.modalTerminosCondicionesSorteo')
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				@include('alerts.allAlerts')
			</div><!-- /div col-md12-sm12-xs12 -->
			{!!Form::open(['route'=>'sorteos.store', 'method'=>'POST', 'files' => true, 'id' => 'FormSorteo'  ])!!}
			<div class="col-md-4 col-sm-12 col-xs-12">
				@include('miniDashboard.miniDashboard')
			</div><!-- /div .col-md4-sm12-xs12 -->
			<div class="col-md-8 col-sm-12 col-xs-12">
				@include('sorteos.forms.fieldsSorteo')
				<div class="list-group">
					<div class="list-group-item">
						<h4>Todos los campos son requeridos</h4>
					</div><!-- /div .list-group-item -->
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!! Form::checkbox('name', 'acepta', false, ['id' => 'AceptaTerminos']) !!} Aceptar <a href="#!" data-toggle="modal" data-target="#myModal" class="btn-link">términos y condiciones</a>
							{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;', 'id' => 'Registrar' , 'disabled'])!!}
							{!!Form::close()!!}<!-- /form #FormSorteo -->
						</div><!-- /div .form-group .has-feedback ..has-feedback-left -->
					</div><!-- /div .list-group-item -->
				</div><!-- /div .list-group -->
			</div><!-- div .col-md8-sm12-xs12 -->
			<div class="col-md-12 col-sm-12 col-xs-12">
			</div><!-- /div .col-md4-sm12-xs12 -->
		</div><!-- /div .row -->
	</div><!-- /div #contentmiddle -->
</div><!-- div .jumbotron -->
@stop


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
	$(document).ready(function(){
		document.getElementById('FormSorteo').onsubmit = function() {
			return false;
		}
		$("#AceptaTerminos").change( function(){
			var checked = $("input[id=AceptaTerminos]:checked").length;
			//Opcional//if($("#AceptaTerminos").is(":checked")){return:true;}
			if(checked === 0){
				if($('#ImagenSorteo').val()){
					$("#Registrar").attr('disabled','disabled');
				}
			}
			else{
				$("#Registrar").removeAttr('disabled');
				document.getElementById("FormSorteo").onsubmit = function() {
					return true;
				}
			}
		});
	});
</script>