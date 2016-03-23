{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/global.js')!!}

{!!Html::script('js/vendor/jquery.timeago.js')!!}

{!!Html::script('js/notificaciones/GestionarNotificaciones.js')!!}
<!--{!!Html::script('js/ajax/InteraccionPublicaciones.js')!!}-->
@extends('layouts.front') 
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
    <h1>Notificaciones</h1>
    <br />
    <div class="row">
    
    @include('alerts.alertFields')
    @include('alerts.errorsMessage')
    @include('alerts.successMessage')
    @include('alerts.warningMessage') 


	<input type="hidden" name="_token" value="{{csrf_token()}}" id="token" />
    {!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}
    @include('pops.forms.panelRight')

    </div>

  </div>
</div>
@stop
<script>

$j(document).ready(function(){

	function eliminarEstado(id){
		$("#publicacion"+id).fadeOut();
	}

	function Interactuar(valor){
		var status_id = valor.replace('estado_','');
		var user_id = $("#user_id").val();
		var token = $("#token").val();
		var route = "http://localhost:8000/interactuar";
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data: {
				status_id: status_id,
				user_id: user_id
			},
			success:function(){
				$('#'+valor).addClass("text-info").fadeIn();
				console.log('exito');
				ContarInteracciones(status_id);
			}
		});
		ContarInteracciones(status_id);
		$('#'+valor).removeClass("text-info").fadeIn();
		return true;
	}

	function ContarInteracciones(status_id){
		status_id = status_id;
		var route = "http://localhost:8000/contarinteracciones/"+status_id;
		var user_id = $("#user_id");
		var Contador = 0;
		$.get(route, function(res){
			$(res).each(function(key,value){
				Contador += 1;
			});
			$("#badge_"+status_id).text(Contador);
		});
	}

});




</script>

