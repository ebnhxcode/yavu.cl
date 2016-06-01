$(document).ready(function(){
/*DECLARACION DE VARIABLES GLOBALES*/
	var Global_idUltimaNotificacion;
	var Global_ContadorCargaNotificaciones;
	var Global_Control = true;
	var Refresh = 100;
/*DECLARACION DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/

	CargarNotificaciones();

//LimpiarEstados();

/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/

	$("#CargarNotificaciones").click(function(e){
		$("#NotificacionesNuevas").append("");
		CargarNotificaciones();			
		e.preventDefault();
		return true;
	});

	$(function(){
		setInterval(function(){
			$("abbr.timeago").timeago();
			Refresh = 30000 + Refresh;
		}, Refresh);
		return true;
	});

/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/

	function CargarNotificaciones(){
		var Notificaciones = $("#Notificacion");
		Global_idUltimaNotificacion = $("#idUltima").val();
		var user_id = $("#user_id").val();
		var Contador = 0;
		var route = "http://localhost:8000/cargarpops/"+Global_idUltimaNotificacion+"/"+user_id+"/todas";
		$.ajax({
			url: route,
			type: 'GET',
			dataType: 'json',
			cache: false,
			jsonpCallback: 'mantener',
			async: true,
			success: function success(data, status) {
				if(Global_Control){mostrarCargando();}
				var ImagenPerfilEmpresa = "";
				$(data).each(function(key,value){
					var TimeAgo = value.created_at;
					Global_idUltimaNotificacion = value.id;
					ImagenPerfilEmpresa = "/img/users/"+value.imagen_perfil_empresa;
					if (value.imagen_perfil_empresa === "" || value.imagen_perfil_empresa === null){
						ImagenPerfilEmpresa = "https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png";
					}
					if($.trim(value.tipo) === 'coins'){
						Notificaciones.hide().append(
							"<div id='notificacion"+value.id+"' class='list-group'>"
								+"<div class='list-group-item'>"
									+"<img src='/img/newGraphics/yavucoin_neo01_small01.png' style='width: 32px;' />&nbsp;"
									+value.contenido
								+"</div>"
								+"<div class='list-group-item panel-footer-small'>"
									+"<small>"
										+"<abbr	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\' datetime='"+TimeAgo+"'></abbr	>"
									+"</small>"
								+"</div>"
							+"</div>"
						).show();
					}else if($.trim(value.tipo) === 'activacion'){
							Notificaciones.hide().append(
								"<div id='notificacion"+value.id+"' class='list-group'>"
									+"<div class='list-group-item'>"
										+"<img src='/img/newGraphics/neo_icono_empresa_crear.png' style='width: 32px; />&nbsp;"
										+value.contenido
									+"</div>"
									+"<div class='>"
										+value.contenido
										+"</div>"
										+"<div class='list-group-item panel-footer-small'>"
										+"<small>"
										+"<abbr	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\' datetime='"+TimeAgo+"'></abbr	>"
										+"</small>"
									+"</div>"
								+"</div>"
							).show();
					}else if($.trim(value.tipo) === 'ticket'){
						Notificaciones.hide().append(
							"<div id='notificacion"+value.id+"' class='list-group'>"
								+"<div class='list-group-item'>"
									+"<img src='/img/newGraphics/neo_icono_tickets.png' style='width: 32px;' />&nbsp;"
									+value.contenido
								+"</div>"
								+"<div class='list-group-item panel-footer-small'>"
									+"<small>"
										+"<abbr	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\' datetime='"+TimeAgo+"'></abbr	>"
									+"</small>"
								+"</div>"
							+"</div>"
						).show();
					}else if(value.tipo === 'sorteo') {
						Notificaciones.hide().append(
							"<div id='notificacion"+value.id+"' class='list-group'>"
								+"<div class='list-group-item'>"
									+"<img src='/img/newGraphics/neo_icono_sorteo.png' style='width: 32px;' />&nbsp;"
									+value.contenido
								+"</div>"
								+"<div class='list-group-item panel-footer-small'>"
									+"<small>"
									+"<abbr	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\' datetime='"+TimeAgo+"'></abbr	>"
									+"</small>"
								+"</div>"
							+"</div>"
						).show();
					}
					document.getElementById("idUltima").value =  Global_idUltimaNotificacion;
					Contador += 1;
					ContarInteracciones(value.id);
				});
				if(Contador < 5){
					if (Global_Control) {
						$("#msj-finPublicaciones").fadeIn();
						setTimeout(function() {
								$("#msj-finPublicaciones").fadeOut(3000);
						},1000);
						Global_Control = false;
					}
				}
				ocultarCargando();
				Global_ContadorCargaNotificaciones += 1 * 5;
				return true;
			}
		});
		return true;
	}

  function ContarInteracciones(status_id) {
    status_id = status_id;
    var route = "http://localhost:8000/contarinteracciones/"+status_id;
    var user_id = $("#user_id").val();
    var Contador = 0;
    $.get(route, function(res){
      $(res).each(function(key,value){
          if(value.user_id === user_id){
            $('#estado_'+status_id).addClass("text-info").fadeIn();
          }
          Contador += 1;
      });
      $("#badge_"+status_id).text(Contador);
    });
		return true;
  }    

	function ContarEstados(){
		var CargarEstados = $("#CargarEstados"); 
		var route = "http://localhost:8000/contarestados";
		var user_id = $("#user_id");
		var Contador = 0;
		$.get(route, function(res){
			$("#EstadosNuevos").value = "";
			$(res).each(function(key,value){
				Contador += 1;
				if (Contador === 5){
					Global_idUltimaNotificacion = value.id;
					$("#EstadosNuevos").append(Contador + " <small>¡Publicaciones Nuevas!</small>");
				}else{
					$("#EstadosNuevos").append("");
				}
			});
			$("#EstadosNuevos").append(Contador + " <small>¡Publicaciones Nuevas!</small>");
		});
		return true;
	}

	function limpiar(status){
		status = status.replace("<script>", "");
		status = status.replace("<script", "");
		status = status.replace("<scrip", "");
		status = status.replace("<scri", "");
		status = status.replace("<scr", "");
		status = status.replace("<sc", "");
		status = status.replace("<s", "");
		status = status.replace("<", ""); 
		status = status.replace("<<<", "");
		status = status.replace("<<", "");
		status = status.replace(">>>", "");
		status = status.replace(">>", "");
		status = status.replace(">", ""); 
		status = status.replace("<>", ""); 
		status = status.replace("</script>", ""); 
		status = status.replace("</script", ""); 
		status = status.replace("</scrip", ""); 
		status = status.replace("</scri", ""); 
		status = status.replace("</scr", ""); 
		status = status.replace("</sc", ""); 
		status = status.replace("</s", ""); 
		status = status.replace("</", ""); 
		status = status.replace("'", ""); 
		status = status.replace("&", ""); 
		status = status.replace('"', ""); 
		status = status.replace("('", ""); 
		status = status.replace("')", ""); 
		status = status.replace(";", ""); 
		status = status.replace(">(", ""); 
		status = status.replace(")<", ""); 
		status = status.replace(">('", ""); 
		status = status.replace("')<", ""); 
		status = status.replace("')<", ""); 
		return status;
	}	

	function mostrarCargando(){
		$("#msj-estado").fadeIn(1000);
		return true;
	}

	function ocultarCargando(){
		$("#msj-estado").fadeOut();
		return true;
	}

/*FUNCIONES Y PROCEDIMIENTOS*/
});