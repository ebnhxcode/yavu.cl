$(document).ready(function(){	
/*DECLARACION DE VARIABLES GLOBALES*/
	var Global_idUltimaPublicacion;
	var Global_ContadorCargaPublicaciones;
	var Global_Control = true;
	//EVENTO CUANDO SE MUEVE EL SCROLL, EL MISMO APLICA TAMBIEN CUANDO SE RESIZA
	var change = false;
	var window_y = $(window).scrollTop();
	$(window).scroll(function(){
		var EstadosUsuario = $("#Estados");
		// VALOR QUE SE HA MOVIDO DEL SCROLL
		scroll_critical = parseInt($("#Estados").height()); // VALOR DE TU DIV
		//console.log(scroll_critical);
		if (window_y > scroll_critical) { // SI EL SCROLL HA SUPERADO EL ALTO DE TU DIV
			// ACA MUESTRAS EL OTRO DIV Y EL OCULTAS EL DIV QUE QUIERES
			CargarEstados();
		}
		return true;
	});
/*DECLARACION DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	CargarEstados();
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
	$("#CargarEstados").click(function(e){
		$("#EstadosNuevos").append("");
		CargarEstados();
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
			var route = "http://localhost:8000/estadoempresa";
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

	$( "#status" ).change(function(e) {
		var status = $("#status").val();
		var status_2 = limpiar(status);
		status_2 = limpiar(status);
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
	function ActualizarEstados(){
		var EstadosUsuario = $("#Estados").val();
		$("#Estados").value ="";
		var route = "http://localhost:8000/estadosempresa";
		var user_id = $("#user_id");
		var Contador = 0;
		$.get(route, function(res){
			Contador += 1;
			if (Contador === 4){
				Global_idUltimaPublicacion = value.id;
			}
			$(res).each(function(key,value){
				var TimeAgo = value.created_at;
				var Estado =
					"<div id='status' class='list-group'>"
						+"<div class='list-group-item'>"
							+"<h4><a href='/profile' style='color:#3C5B28;'>"
								+"<img class='media-object' src='http://localhost:8000/images/user.png' data-holder-rendered='true' style='width: 32px; height: 32px;'/>"
								+value.nombre+" "+value.apellido
							+"</a></h4>"
							+"<small>"
								+"Publicó <abbr class=\'timeago\' title=\'"+TimeAgo+"\'>"+TimeAgo+"</abbr>"
							+"</small><hr>"
							+"<p>"+value.status+"</p>"
						+"</div>"
						+"<div class='list-group-item panel-footer'>"
							+"<a name='like' id='estado_"+value.id+"' value='"+value.id+"' href='#!' style='color:#3C5B28;'><span>Cobrar coins</span></a>"
						+"</div>"
					+"</div>";
				EstadosUsuario.appendTo("#e").effects("highlight", {}, 12000);
			});
		});
		return true;
	}

  function ContarInteracciones(status_id){
    status_id = status_id;
    var route = "http://localhost:8000/contarinteracciones/"+status_id;
    var user_id = $("#user_id").val();
    var Contador = 0;
    $.get(route, function(res){
      $(res).each(function(key,value){
				if(value.user_id === user_id){
					$('#estado_'+status_id).addClass("btn-coins-down").fadeIn();
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
			var EstadosNuevos = $("#EstadosNuevos");
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
	}

	function limpiar(status){
		status = status.replace("<script>", "");
		status = status.replace("<script", "");
		status = status.replace("<scrip", "");
		status = status.replace("<scri", "");
		status = status.replace("<scr", "");
		status = status.replace("<sc", "");
		status = status.replace("<s", "");
		status = status.replace("<<<", "");
		status = status.replace("<<", "");
		status = status.replace("<", ""); 
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

	function CargarEstados(){
		var Estados = $("#Estados"); 
		var empresa = $("#empresa").val();
		Global_idUltimaPublicacion = $("#idUltima").val();
		var route = "http://localhost:8000/estadosempresa/"+Global_idUltimaPublicacion+"/"+empresa;
		var user_id = $("#user_id").val();
		var empresa_id = $("#empresa_id");
		var Contador = 0;
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


					+'<div style="float: right; padding-top: 2px;" class="dropdown">'
					+'<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
					+'<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>'
					+'<span class="caret"></span>'
					+'</button>'
					+'<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">'
					+'<li><a onclick="eliminarEstado('+value.id+','+value.user_id+')" href="#!">'+(user_id==value.user_id?"Eliminar":"Ocultar")+' publicación</a></li>'
					+(user_id==value.user_id?"<li><a onclick='eliminarEstado("+value.id+",0)' href='#!'>Ocultar estado</a></li>":"")
					+'</ul>'
					+'</div><!-- /div dropdown -->'




							+'</div><!-- /div dropdown -->'+

							'<div class="media">'+
								'<div class="media-left">'+
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
						+"<p>"+value.status+"</p>"
					+'</div><!-- /div list-group-item -->'


						+"<div class='list-group-item panel-footer'>"

							+"<span id='badge_"+value.id+"' class='label label-warning'></span>"+"&nbsp;"
							+"<span role='button' class='' href='#!' style='color:#3C5B28'>"
							+"<span name='megusta' class='text-warning btn-coins' onclick='Interactuar(this.id)' id='estado_"+value.id+"' value='e"+value.idEmpresa+"'>"
							+"Cobrar coins"
							+"</span>"
							+"</span>"

						+"</div>"
					+"</div>"
				).show();
				document.getElementById("idUltima").value =  Global_idUltimaPublicacion;
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
			Global_ContadorCargaPublicaciones += 1 * 5;
			return true;
		});
		return true;
	}
	function mostrarCargando(){		
		$("#msj-estado").fadeIn(1000);
		return true;
	}
	function ocultarCargando(){
		$("#msj-estado").fadeOut();
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
					Global_idUltimaPublicacion = value.id;
					$("#EstadosNuevos").append(Contador + " <small>¡Publicaciones Nuevas!</small>");
				}else{
					$("#EstadosNuevos").append("");
				}
			});
			$("#EstadosNuevos").append(Contador + " <small>¡Publicaciones Nuevas!</small>");
		});
		return true;
	}
	function ContarCoins(){
		var CargarEstados = $("#CargarEstados");
		var route = "http://localhost:8000/contarcoins";
		var user_id = $("#user_id");
		$.get(route, function(res){
			$(".CantidadCoins").value = "";
			$(res).each(function(key,value){
				if(parseInt(value)>0){
					$(".CantidadCoins").show('fast').append(formatNumber.new(value, "$ "));
				}
			});
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
				console.log('exitonowei');
				ContarInteracciones(status_id);

				ContarNotificaciones();
				ContarCoins();
			}
		});
		ContarInteracciones(status_id);
		$('#'+valor).removeClass("text-info").fadeIn();
		return true;
	}

/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});
