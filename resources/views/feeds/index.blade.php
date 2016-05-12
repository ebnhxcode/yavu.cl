{!!Html::script('js/jquery.js')!!}
{!!Html::script('js/publicaciones/GestionarPublicacionesFeeds.js')!!}
{!!Html::script('js/ajax/InteraccionPublicaciones.js')!!}
@extends('layouts.front') 
@section('content')
<div class="jumbotron">
  <div id="contentMiddle">
		<div style="font-size: 3em;">
			<img width="64px" style="padding-bottom: 20px;" src= "{!!URL::to('img/newGraphics/neo_icono_publicaciones.png')!!}" /><span>Publicaciones</span>
		</div>
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
				@include('alerts.alertFields')
				@include('alerts.errorsMessage')
				@include('alerts.successMessage')
				@include('alerts.warningMessage')
				@include('alerts.infoMessage')
			</div>

				<!-- panel izquierdo -->
			@include('feeds.forms.panelLeft')

			<input type="hidden" name="_token" value="{!!csrf_token()!!}" id="token" />
			{!!Form::hidden('user_id', Auth::user()->get()->id, ['id'=>'user_id'])!!}

			<!-- panel derecho -->
			@include('feeds.forms.panelRight')

    </div><!-- /div row -->

  </div><!-- /div contentMiddle -->
</div>
@stop
<script>
	var formatNumber = {
		separador: ".", // separador para los miles
		sepDecimal: ',', // separador para los decimales
		formatear:function (num){
			num +='';
			var splitStr = num.split('.');
			var splitLeft = splitStr[0];
			var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
			var regx = /(\d+)(\d{3})/;
			while (regx.test(splitLeft)) {
				splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
			}
			return this.simbol + splitLeft  +splitRight;
		},
		new:function(num, simbol){
			this.simbol = simbol ||'';
			return this.formatear(num);
		}
	}

	function eliminarEstado(id, user_id){
		//console.log( $("#user_id").attr('value')+"/"+user_id);
		user_id = user_id || null;
		var user_anon = $("#user_id").attr('value') || null;


		if( user_anon === user_id){
			var route = "http://yavu.cl/eliminarfeed/"+id;
			$.ajax({
				url: route,
				type: 'GET',
				dataType: 'json',
				success:function(){
					console.log('exito');
					return $("#publicacion"+id).fadeOut();
				}
			});
		}else{
			//console.log(user_anon+"-"+user_id);
			return $("#publicacion"+id).fadeOut();
		}
		return true;
	}

	function Interactuar(valor) {
		var status_id = valor.replace('estado_', '');
		var e_id = $('#estado_' + status_id).attr('value').replace('e','');
		var user_id = $("#user_id").val();
		var token = $("#token").val();
		var route = "http://yavu.cl/interactuar";
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data: {
				status_id: status_id,
				user_id: user_id,
				empresa_id: e_id
			},
			success:function(){
				$('#'+valor).addClass("text-info").fadeIn();
				console.log('exito');
				ContarInteracciones(status_id);
				ContarNotificaciones();
				ContarCoins();
			}
		});
		ContarInteracciones(status_id);
		$('#'+valor).addClass("text-info").fadeIn();
		return true;
	}

	function ContarInteracciones(status_id){
		status_id = status_id;
		var route = "http://yavu.cl/contarinteracciones/"+status_id;
		var user_id = $("#user_id").val();
		var Contador = 0;
		$.get(route, function(res){
			$(res).each(function(key,value){
				if(value.user_id === user_id){
					//$('#estado_'+status_id).addClass("btn-coins-down").fadeIn();
					$('#imgcoin'+status_id).attr('src', '/img/newGraphics/cobrar_coins02.png').fadeIn();
					//+"<img id='imgcoin"+value.id+"' src='/img/newGraphics/yavucoin_neo01_small01.png' />"
				}
				//Contador += 1;
			});
			//$("#badge_"+status_id).text(Contador);
		});
		return true;
	}

	function ContarNotificaciones(){
		var user_id = $("#user_id").val();
		$.ajax({
			url: "http://yavu.cl/cargarpops/"+$("#idUltimaNotificacion").val()+"/"+user_id+"/novistas",
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function success(data, status) {
				if (data > 0) {
					$("#CantidadNotificaciones").show('fast').text(data);
					//$("#Notificaciones").css('color','#F5A9A9');
				}else{
					$("#CantidadNotificaciones").hide('fast').text("");
					//$("#Notificaciones").css('color','');
				}
			},
			error: function error(xhr, textStatus, errorThrown) {
				//alert('Remote sever unavailable. Please try later');
			}
		});
		return true;
	}
	function ContarCoins(){
		var route = "http://yavu.cl/contarcoins";
		var user_id = $("#user_id");
		$.get(route, function(res){
			$(".CantidadCoins").text("");
			$(res).each(function(key,value){
				if(parseInt(value)>0){
					$(".CantidadCoins").append(formatNumber.new(value, "$ "));
				}
			});
		});
		return true;
	}

</script>

