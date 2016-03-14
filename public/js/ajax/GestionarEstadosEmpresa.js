$(document).ready(function(){	
	/*DECLARACION DE VARIABLES GLOBALES*/
	var Global_idUltimaPublicacion;
	var Global_ContadorCargaPublicaciones;
	var Global_Control = true;
	/*DECLARACION DE VARIABLES GLOBALES*/

	/*MÉTODOS CONSTRUCTORES*/

	CargarEstados();

	/*MÉTODOS CONSTRUCTORES*/

	/*SELECTORES*/
	$("#CargarEstados").click(function(e){
		$("#EstadosNuevos").append("");
		CargarEstados();			
		e.preventDefault();
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
				    console.log("La ultima publicacion ID: "+$("#idUltima").val());
				}
			});	
			
			//ContarEstados();
		}else{
			document.getElementById("status").focus();
		}	
		CargarEstados();
		e.preventDefault();	
	});

	$("#limpiar").click(function(e){
		document.getElementById("status").value = "";
		e.preventDefault();
	});

	$( "#status" ).change(function(e) {
		var status = $("#status").val();
		var status_2 = limpiar(status);
		status_2 = limpiar(status);
		status_2 = limpiar(status);
		if (status != status_2){
			console.log("son distintos");
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
	});
	/*SELECTORES*/

	/*FUNCIONES Y PROCEDIMIENTOS*/
	function ActualizarEstados(){
		var EstadosUsuario = $("#Estados").val(); 
		$("#Estados").val() ="";
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
							+"<a name='like' class='inter' role='button' id='estado_"+value.id+"' value='"+value.id+"' href='#!' style='color:#3C5B28;'><span>Cobrar coins</span></a>"
						+"</div>"
					+"</div>";

				EstadosUsuario.appendTo("#e").effects("highlight", {}, 12000);
				//$("#Estados").appendTo('#Estados').effects("highlight", {}, 12000);


			});
		});						
	}
  function ContarInteracciones(status_id)
  {
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
  }    

	function ContarEstados()
	{
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
	}

	function humanTiming(time)
	{
		var now = new Date();
		var nowTime = now.getTime()
		nowTime = nowTime - Date.parse(time);
		//console.log(nowTime);
	    var tokens = [
	    	[1, 'segundo'],
	    	[60, 'minuto'],
	    	[3600, 'hora'],
	    	[86400, 'día'],
	    	[604800, 'semana'],
	    	[2592000, 'mes'],
	    	[31536000, 'año']
	   ];
	   //console.log(JSON.stringify(tokens[0][1])); //unidad
	   //console.log(JSON.stringify(tokens[0][0])); //cantidad
	   	var numberOfUnits = 0;
		for(var i = 0, len = tokens.length; i < len; i++){
			if (nowTime < tokens[i][0]) {	
				

				if (tokens[i][1] === 'día'){
					numberOfUnits = nowTime/(tokens[i-1][0])*10;

				}else if(tokens[i][1] === 'semana'){
					numberOfUnits = nowTime*tokens[i][0]*10;

				}else if(tokens[i][1] === 'mes'){

					//numberOfUnits = nowTime*tokens[i+1][0]*10;
					console.log(tokens[i][1]+"/"+tokens[i][0]+"/"+numberOfUnits+"/"+nowTime);
				}

				if(Math.floor(numberOfUnits) > 365 && tokens[i][1] === 'año'){
					
					//console.log(numberOfUnits+"//"+tokens[i][0]);
					var mes = Math.floor(numberOfUnits/tokens[i][0]);

					//console.log(mes+"//"+i+"//"+tokens[i][0]+"//"+numberOfUnits);

					if ( mes === 0 ){ mes = 1; }
					return "hace "+mes+" "+tokens[i][1]+((mes>1)?'s':'');

				}else if(Math.floor(numberOfUnits) >= 31 && Math.floor(numberOfUnits) < 365){
					var semana = Math.round(numberOfUnits/12);
					return "hace "+semana+" "+tokens[i+1][1]+((semana>1)?'s':'');

				}else if(Math.floor(numberOfUnits) >= 7 && Math.floor(numberOfUnits) < 31){
					var dia = Math.round(numberOfUnits/7);
					return "hace "+dia+" "+tokens[i+1][1]+((dia>1)?'s':'');

				}else if(Math.floor(numberOfUnits) >= 1 && Math.floor(numberOfUnits) < 7){
					var hora = Math.floor(numberOfUnits);
					return "hace "+hora+" "+tokens[i][1]+((hora>1)?'s':'');	

				}else if(Math.floor(numberOfUnits) < 1){
					//console.log(nowTime+"(nowTime)/"+i+"(i)/"+tokens[i][0]+"(cant)/"+tokens[i][1]+"(text)/");
					//console.log(numberOfUnits+"/"+tokens[i][1]);


					if (numberOfUnits > 0.0416 ){
						var minuto = Math.floor(24*numberOfUnits);
						return "hace "+minuto+" "+tokens[i-1][1]+((minuto>1)?'s':'');	

					}else if(numberOfUnits < 0.0416 && numberOfUnits > 0.000693333 ){						
						numberOfUnits = Math.floor(((numberOfUnits*100)/4.)*60);
						return "hace "+numberOfUnits+" "+tokens[i-2][1]+((numberOfUnits>1)?'s':'');

					}else if(numberOfUnits < 0.000293333 ){
						return 'hace pocos minutos';

					}
				}	
			}else{	
				nowTime = Math.floor(nowTime/tokens[i][0]);					
			}
		}	    	
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
		var user_id = $("#user_id");
		var empresa_id = $("#empresa_id");
		var Contador = 0;
		$.get(route, function(res){
			if(Global_Control){mostrarCargando();}
			var ImagenPerfilEmpresa = "";
			$(res).each(function(key,value){				
				var TimeAgo = value.created_at;
				Global_idUltimaPublicacion = value.id;	

				ImagenPerfilEmpresa = "/img/users/"+value.imagen_perfil_empresa;

				if (value.imagen_perfil_empresa === "" || value.imagen_perfil_empresa === null)
				{
					ImagenPerfilEmpresa = "https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png";
				}

				Estados.hide().append(
					"<div id='publicacion"+value.id+"' class='list-group'>"
						+"<div class='list-group-item'>"	
							+'<div class="dropdown">'
								+'<button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'
									+'<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>'
									+'<span class="caret"></span>'
								+'</button>'
								+'<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">'
									+'<li><a onclick="eliminarEstado('+value.id+')" href="#!">Eliminar publicación</a></li>'
								+'</ul>'
							+'</div>'																	  	
						  	+"<h4><a href='/empresa/"+value.nombreEmp+"' style='color:#3C5B28;'>"
						  		+"<img class='media-object' src='"+ImagenPerfilEmpresa+"' data-holder-rendered='true' style='width: 32px; height: 32px;'/>"
						  		+'&nbsp;'
								+value.nombreEmp+" Idp:("+Global_idUltimaPublicacion+")"
							+"</a></h4>"
							+"<small>"
								+"Publicó <span	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+humanTiming(TimeAgo)+"</span	>"
							+"</small><hr>"		
							+"<p>"+value.status+"</p>"
						+"</div>"
						+"<div class='list-group-item panel-footer'>"					
							+"<span id='badge_"+value.id+"' class='label label-success'></span>"+"&nbsp;"
							+"<a role='button' class='btn-lg btn' href='#!' style='color:#3C5B28'>"
								+"<span name='megusta' onclick='Interactuar(this.id)' id='estado_"+value.id+"' value='"+value.id+"'>"
									+"Cobrar coins"
								+"</span>"
							+"</a>"
						+"</div>"
					+"</div>"
				).show('slow');	
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
	}
	function mostrarCargando(){		
		$("#msj-estado").fadeIn(1000);
	}
	function ocultarCargando(){
		$("#msj-estado").fadeOut();
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
					//CargarEstados.append(Contador);
					//console.log(Contador);
				}else{
					$("#EstadosNuevos").append("");
				}
			});
			$("#EstadosNuevos").append(Contador + " <small>¡Publicaciones Nuevas!</small>");
			//console.log(Contador);
		});						
	}

	/*FUNCIONES Y PROCEDIMIENTOS*/
    // EVENTO CUANDO SE MUEVE EL SCROLL, EL MISMO APLICA TAMBIEN CUANDO SE RESIZA
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
	});	
});

/*
				EstadosUsuario.append(
					"<div class='list-group'>"
					+"No hay mas publicaciones"
					+"</div>"
				);   
*/