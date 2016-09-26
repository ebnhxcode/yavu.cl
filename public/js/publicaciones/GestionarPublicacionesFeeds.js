$(document).ready(function(){	
/*DECLARACION DE VARIABLES GLOBALES*/

	var Global_idUltimaPublicacion;
	var Global_ContadorCargaPublicaciones;
	var Global_Control = true;
	var Refresh = 100;

/*DECLARACION DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/

	CargarEstados();

//LimpiarEstados();

	$(function(){
		setInterval(function(){
			$("abbr.timeago").timeago();
			Refresh = 30000 + Refresh;
		}, Refresh);
		return true;
	});


/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/

	$("#CargarEstados").click(function(e){
		$("#EstadosNuevos").append("");
		if(Global_idUltimaPublicacion > 1){
			CargarEstados();			
		}
		e.preventDefault();
		return true;
	});

	$("#publicar").click(function(e){
		document.getElementById("idUltima").value = "0";
		$("#Estados").empty();
		if (document.getElementById("status").value !== "") {
			var status = $("#status").val();
			status = limpiar(status);
			var user_id = $("#user_id").val();
			var empresa_id = $("#empresa_id").val();
			var token = $("#token").val();
			var route = "http://192.168.0.103/estadoempresa";
			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'POST',
				dataType: 'json',
				data: {
					status: status,
					user_id: user_id,
					empresa_id: empresa_id
				},
				success:function(){
					$("#msj-success").fadeIn();
					setTimeout(function() {
						$("#msj-success").fadeOut(1000);
					},800);
					document.getElementById("status").value = "";
				}
			});
		}else{
			document.getElementById("status").focus();
		}
		CargarEstados();
		e.preventDefault();
		return true;
	});

	$("#limpiar").click(function(e){
		document.getElementById("status").value = "";
		e.preventDefault();
		return true;
	});

	$( "#status" ).change(function(e){
		var status = $("#status").val();
		var status_2 = limpiar(status);
		status_2 = limpiar(status);
		if (status != status_2){
			var status = $("#status").val();
			if (status !== limpiar(status)){
			  $('#msj-error').append();
				$("#msj-error").fadeIn();
				setTimeout(function() {
						$("#msj-error").fadeOut(8000);
				},800);
			}
		}	
		e.preventDefault();
		return true;
	});
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/

	/*
	function ActualizarEstados(){
		var EstadosUsuario = $("#Estados").val(); 
		$("#Estados").value = "";
		var route = "http://192.168.0.103/estadosusuario";
		var user_id = $("#user_id");
		var Contador = 0;
		$.get(route, function(res){
			Contador += 1;
			if (Contador === 4){
				Global_idUltimaPublicacion = value.id;
			}
			$(res).each(function(key, value){
				var TimeAgo = value.created_at;
				var Estado = 
					"<div id='status' class='list-group'>"
						+"<div class='list-group-item'>"	
							+"<h4><a href='/profile' style='color:#3C5B28;'>"
								+"<img class='media-object' src='http://192.168.0.103/images/user.png' data-holder-rendered='true' style='width: 32px; height: 32px;'/>"
								+value.nombre+" "+value.apellido
							+"</a></h4>"
							+"<small>"
								+"Publicó <abbr class=\'timeago\' title=\'"+TimeAgo+"\'>"+TimeAgo+"</abbr>"
							+"</small><hr>"		
							+"<p>"+value.status+"</p>"
						+"</div>"
						+"<div class='list-group-item panel-footer'>"
							+"<span class='glyphicon glyphicon-hand-up'>&nbsp;</span>"
							+"<a name='like' id='estado_"+value.id+"' value='"+value.id+"' href='#!' style='color:#3C5B28;'>"
							+"<span>Cobrar coins</span></a>"
						+"</div>"
					+"</div>";

				EstadosUsuario.appendTo("#e").effects("highlight", {}, 12000);
			});
		});
	}
	*/

	function CargarEstados(){
		var Estados = $("#Estados");
		var route = "http://192.168.0.103/cargarfeeds/"+$("#idUltima").val();
		var Contador = 0;
		var user_id = $("#user_id").val();
		$.get(route, function(res){
			if(Global_Control){mostrarCargando();}
			var ImagenPerfilEmpresa = "";
			$(res).each(function(key,value){				
				var TimeAgo = value.created_at;
				Global_idUltimaPublicacion = value.id;		
				ImagenPerfilEmpresa = "/img/users/"+value.imagen_perfil_empresa;
				if (value.imagen_perfil_empresa === "" || value.imagen_perfil_empresa === null){
					ImagenPerfilEmpresa = "https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png";
				}
				Estados.hide().append(
					"<div id='publicacion"+value.id+"' class='list-group'>"
						+"<div style='padding: 0px 2px 2px 2px;' class='list-group-item list-group-item-success'>"
							+'<div class="dropdown">'

								+'<div style="float: right; padding-top: 8px; padding-right: 5px" class="dropdown">'
								 	+'<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
										+'<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>'
										+'<span class="caret"></span>'
									+'</button>'
									+'<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">'
										+'<li><a href="/empresa/'+value.nombreEmp+'" id="" value="'+value.id+'" role="button">Ver perfil</a></li>'
										+'<li><a onclick="eliminarEstado('+value.id+','+value.user_id+')" href="#!">'+(user_id==value.user_id?"Eliminar":"Ocultar")+' publicación</a></li>'
										+(user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")
										+(user_id==value.user_id?"<li><a href='/feeds/"+value.id+"/edit'>Editar publicaci&oacute;n</a></li>":"")
									+'</ul>'
								+'</div><!-- /div dropdown -->'

							+'</div><!-- /div dropdown -->'+

							'<div class="media">'+
								'<div style="padding-left: 8px;" class="media-left">'+
									'<a href="#">'+
					 					"<img class='media-object' src='"+ImagenPerfilEmpresa+"' data-holder-rendered='true' style='width: 32px; height: 32px;'/>"+
									'</a>'+
								'</div>'+
								'<div class="media-body">'+
									'<h4 class="media-heading"><a href="/empresa/'+value.nombreEmp+'" style="color:#3C5B28;">'+value.nombreEmp+'</a></h4>'+
									"<small>Publicó <abbr class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+TimeAgo+"</abbr></small>"+
								'</div>'+
							'</div><!-- /div media -->'

						+"</div><!-- /div list-group-item-success -->"

						+'<div class="list-group-item">'
							+"<h4>"+value.status+"</h4>"
						+"</div><!-- /div list-group-item -->"

						+"<div class='list-group-item panel-footer'>"

							+"<span role='button' class='' href='#!' style='color:#3C5B28'>"
								+"<span name='megusta' class='' onclick='Interactuar(this.id)' id='estado_"+value.id+"' value='e"+value.idEmpresa+"'>"
									+"<!--<img id='imgcoin"+value.id+"' src='/img/newGraphics/cobrar_coins.png' />--><span id='cobrarcoins"+value.id+"'>Cobrar coins</span>&nbsp;<span id='cobrarcoinspig"+value.id+"'></span>"
								+"</span>"
							+"</span>"

						+"</div><!-- /div list-group-item panel footer -->"
					+"</div><!-- /div list-group -->").show();
				document.getElementById("idUltima").value =  Global_idUltimaPublicacion;
				Contador += 1;
				try {
					ContarInteracciones(value.id);
				}
				catch(err) {
					document.getElementById("demo").innerHTML = err.message;
					console.log(err.message);
				}


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
			Global_ContadorCargaPublicaciones += 1 * 5;
		});
		return true;
	}
/*
  function ContarInteracciones(status_id){
    status_id = status_id;
    var route = "http://192.168.0.103/contarinteracciones/"+status_id;
    var user_id = $("#user_id").val();
    var Contador = 0;
    $.get(route, function(res){
      $(res).each(function(key,value){
				if(value.user_id === user_id){
					//$('#estado_'+status_id).addClass("btn-coins-down").fadeIn();
					//$('#imgcoin'+status_id).attr('src', '/img/newGraphics/cobrar_coins02.png').fadeIn();
					$('#cobrarcoins'+status_id).addClass("text-info").fadeIn();
					//+"<img id='imgcoin"+value.id+"' src='/img/newGraphics/yavucoin_neo01_small01.png' />"
				}
				Contador += 1;
      });
      $("#badge_"+status_id).text(Contador);
    });
		return true;
  }
*/
	function ContarEstados(){
		var CargarEstados = $("#CargarEstados");
		var EstadosNuevos = ("#EstadosNuevos");
		var route = "http://192.168.0.103/contarestados";
		var user_id = $("#user_id");
		var Contador = 0;
		$.get(route, function(res){
			EstadosNuevos.value = "";
			$(res).each(function(key,value){
				Contador += 1;
				if (Contador === 5){
					Global_idUltimaPublicacion = value.id;
					EstadosNuevos.append(Contador + " <small>¡Publicaciones Nuevas!</small>");
				}else{
					EstadosNuevos.append("");
				}
			});
			EstadosNuevos.append(Contador + " <small>¡Publicaciones Nuevas!</small>");
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