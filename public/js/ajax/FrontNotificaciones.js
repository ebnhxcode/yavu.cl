$(document).ready(function(){
/*DECLARACIÓN DE VARIABLES GLOBALES*/
	var Global_swap_notificaciones = true;
	var Global_swap_mensajes = true;
	var Global_idUltimaNotificacion;
	var Global_ContadorCargaNotificaciones;
	var Global_Control = true;
	var Refresh = 100;
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	ContarNotificaciones();
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
  	$(function () {
  		var popover = $('[data-toggle="popover"]');
    	popover.popover({ html : true , trigger : 'manual'});
      $('#Notificaciones, #CantidadNotificaciones').bind('click',function(){
        CargarNotificaciones();
				ContarNotificaciones();
				return true;
      });
      $('#Mensajes, #CantidadMensajes').bind('click',function(){
        CargarMensajes();
				return true;
      });
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
		var user_id = $("#user_id").val();
		var Contador = 0;
		var pops = "";
		$.ajax({
			url: "http://localhost:8000/cargarpops/"+Global_idUltimaNotificacion+"/"+user_id+"/todas",
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function success(data, status) {
				var ImagenPerfilEmpresa = "";
				$(data).each(function(key, value){
					var TimeAgo = value.created_at;
					Global_idUltimaNotificacion = value.id;		
					ImagenPerfilEmpresa = "/img/users/"+value.imagen_perfil_empresa;
					if (value.imagen_perfil_empresa === "" || value.imagen_perfil_empresa === null){
						ImagenPerfilEmpresa = "https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png";
					}					
					if($.trim(value.tipo) === 'coins'){
						pops +=
						"<div class='list-group-item-hover'>"
							+"<div class='text-info' >"
								+"<img src='/img/yavu007.png' style='width: 32px; height: 30px;' />&nbsp;"+value.contenido+"<br>"
								+"<small>"
									+"<abbr class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+TimeAgo+"</abbr>"
								+"</small>"
							+"</div>"
						+"</div>";
					}else if($.trim(value.tipo) === 'activacion'){
						pops +=
						"<div class='list-group-item-hover'>"
							+"<div class='text-info' >"
								+"<img src='/img/yavu007.png' style='width: 32px; height: 32px;' />&nbsp;"+value.contenido+"<br>"
								+"<small>"
									+"<abbr class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+TimeAgo+"</abbr>"
								+"</small>"
							+"</div>"
						+"</div>";
					}else{
						pops +=
						"<div class='list-group-item-hover'>"
							+"<div class='text-info' >"
								+"<img src='/img/yavu007.png' style='width: 32px; height: 30px;' />&nbsp;"
								+value.contenido+"<br>"
								+"<small>"
									+"<abbr class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+TimeAgo+"</abbr>"
								+"</small>"
							+"</div>"
						+"</div>";
					}
					Contador += 1;
				});
				var finalData =
				"<div class='list-group' style='overflow-y: scroll;height:200px;'>"
						+pops
					+"<div class='list-group-item'><a class='text-warning' href='/pops'>ver todas</a></div>"
				+"</div>";
				$('#Notificaciones').attr('data-content', finalData);
				Global_idUltimaNotificacion = 0;
				Global_ContadorCargaNotificaciones += 1 * 5;
	    	if(Global_swap_notificaciones){
	    		$('#Notificaciones').popover('show');
	    		$('#Mensajes').popover('hide');
	    		Global_swap_notificaciones = false;	
	    	}else{
	    		$('#Notificaciones').popover('hide');
	    		Global_swap_notificaciones = true;
	    	}	    	
			},
			error: function error(xhr, textStatus, errorThrown) {
			  //alert('Remote sever unavailable. Please try later');
			}
		});
		return true;
	}

	function ContarNotificaciones(){
		var user_id = $("#user_id").val();
		$.ajax({
			url: "http://localhost:8000/cargarpops/"+$("#idUltimaNotificacion").val()+"/"+user_id+"/novistas",
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function success(data, status) {
				if (data > 0) {
          $("#CantidadNotificaciones").text(data);
          //$("#Notificaciones").css('color','#F5A9A9');
        }else{
          $("#CantidadNotificaciones").text("");
          //$("#Notificaciones").css('color','');
        }
			},
			error: function error(xhr, textStatus, errorThrown) {
			  //alert('Remote sever unavailable. Please try later');
			}
		});
		return true;
	}

	function CargarMensajes(){
		var data = "<div class='list-group'>";
		data +=	"<div class='list-group-item'><a class='text-info' href='#!'>Mensaje 1</a></div>";
		data += "<div class='list-group-item'><a class='text-info' href='#!'>Mensaje 2</a></div>";
		data += "<div class='list-group-item-full-header'><a class='text-warning' href='#!'>ver más</a></div>";
		data += "</div>";
		$('#Mensajes').attr('data-content', data);
		if(Global_swap_mensajes){
			$('#Mensajes').popover('show');
			$('#Notificaciones').popover('hide');
			Global_swap_mensajes = false;
		}else{
			$('#Mensajes').popover('hide');
			Global_swap_mensajes = true;
		}
		return true;
	}
/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});