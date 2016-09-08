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


  		//var popover = $('[data-toggle="popover"]');

			$('[data-toggle="popover"]').popover({
				html: true,
				trigger: 'manual',
				//animation: false,
				placement: 'bottom',
				content: function () {
					CargarNotificaciones();
					//$return = '<div class="hover-hovercard"></div>';
				}
			}).on("mouseenter", function () {
				var _this = this;
				$(this).popover("show");
				$(this).siblings(".popover").on("mouseleave", function () {
					$(_this).popover('hide');
				});
			}).on("mouseleave", function () {
				var _this = this;
				setTimeout(function () {
					if (!$(".popover:hover").length) {
						$(_this).popover("hide")
					}
				}, 100);
			});
		});

			//popover.popover({ html : true , trigger : 'manual'});
			//popover.popover('show');
		$(function () {
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
			url: "http://192.168.1.42/cargarpops/"+Global_idUltimaNotificacion+"/"+user_id+"/todas",
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function success(data, status) {
				var ImagenPerfilEmpresa = "";
				$(data).each(function(key, value){
					console.log(value);
					var TimeAgo = value.created_at;
					Global_idUltimaNotificacion = value.id;		
					ImagenPerfilEmpresa = "/img/users/"+value.imagen_perfil_empresa;
					if (value.imagen_perfil_empresa === "" || value.imagen_perfil_empresa === null){
						ImagenPerfilEmpresa = "https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png";
					}					
					if($.trim(value.tipo) === 'coins'){
						pops +=
						"<div class='list-group-item'>"
							+"<div class='text-info' >"
								+"<img src='/img/newGraphics/yavucoin_neo01_small01.png' style='width: 32px;' />&nbsp;"+value.contenido+"<br>"
								+"<small>"
									+"<abbr class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+TimeAgo+"</abbr>"
								+"</small>"
							+"</div>"
						+"</div>";
					}else if($.trim(value.tipo) === 'activacion'){
						pops +=
							"<a class='list-group-item' href='/empresas/"+value.ide+"'>"
								+"<div >"
									+"<div class='text-info' >"
										+"<img src='/img/newGraphics/neo_icono_empresa_crear.png' style='width: 32px;' />&nbsp;"+value.contenido+"<br>"
										+"<small>"
											+"<abbr class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+TimeAgo+"</abbr>"
										+"</small>"
									+"</div>"
								+"</div>"
							+"</a>";
					}else if($.trim(value.tipo) === 'ticket') {
						Notificaciones.hide().append(
							"<div id='notificacion" + value.id + "' class='list-group'>"
							+ "<div class='list-group-item'>"
							+ "<img src='/img/newGraphics/neo_icono_tickets.png' style='width: 32px;' />&nbsp;"
							+ value.contenidoe
							+ "</div>"
							+ "<div class='list-group-item panel-footer-small'>"
							+ "<small>"
							+ "<abbr	 class='timeago' id='timeago" + value.id + "' value='" + TimeAgo + "' title='" + TimeAgo + "\' datetime='" + TimeAgo + "'></abbr	>"
							+ "</small>"
							+ "</div>"
							+ "</div>"
						).show();
					}else if($.trim(value.tipo) === 'sorteo'){
						pops +=
						"<a href='/sorteos/"+value.poptype_id_helper+"' class='list-group-item'>"
							+"<div class='text-info' >"
								+"<img src='/img/newGraphics/neo_icono_sorteo.png' style='width: 32px;' />&nbsp;"
								+value.contenido+"<br>"
								+"<small>"
									+"<abbr class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+TimeAgo+"</abbr>"
								+"</small>"
							+"</div>"
						+"</a>";
					}
					Contador += 1;
				});

				var finalData =
				"<div class='list-group' style='overflow-y: scroll;height:200px;'>"
						+pops
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
			url: "http://192.168.1.42/cargarpops/"+$("#idUltimaNotificacion").val()+"/"+user_id+"/novistas",
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
