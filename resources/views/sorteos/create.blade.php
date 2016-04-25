@extends('layouts.front')
@section('content')
<div class="jumbotron">
	<div id="contentMiddle">
		@include('alerts.alertFields')
    @include('sorteos.forms.modalTerminosCondicionesSorteo')
    <div class="" style="font-size: 3em;">
      <img id="img" width="8%" src= "{!!URL::to('img/dash/ico_sorteo01.png')!!}"/><span >Sorteos <span class="requerido">\</span> Crear nuevo</span>
    </div>
		<div class="row">
			{!!Form::open(['route'=>'sorteos.store', 'method'=>'POST', 'files' => true, 'id' => 'FormSorteo'  ])!!}
			@include('sorteos.forms.fieldsSorteo')
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="list-group">
					<div class="list-group-item">
						<h4>Todos los campos son requeridos</h4>
					</div>
					<div class="list-group-item">
						<div class="form-group has-feedback has-feedback-left">
							{!! Form::checkbox('name', 'acepta', false, ['id' => 'AceptaTerminos']) !!} Aceptar <a href="#!" data-toggle="modal" data-target="#myModal" class="btn-link">términos y condiciones</a>
							{!!Form::submit('Registrar', ['class'=>'btn btn-primary btn-success', 'style'=>'width:100%;', 'id' => 'Registrar' , 'disabled'])!!}
							{!!Form::close()!!}
						</div>
					</div>
				</div><!-- /div list-group -->
			</div><!-- /div col-md-4 col-sm-12 col-xs-12 -->
		</div><!-- /div row -->
	</div><!-- /div content middle -->
</div><!-- div jumbotron -->
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
				$("#Registrar").attr('disabled','disabled');
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