$(document).ready(function(){	
	/*DECLARACION DE VARIABLES GLOBALES*/
	var Global_idUltimaNotificacion;
	var Global_ContadorCargaNotificaciones;
	var Global_Control = true;
	/*DECLARACION DE VARIABLES GLOBALES*/

	/*MÉTODOS CONSTRUCTORES*/
	CargarNotificaciones();
	//LimpiarEstados();

	setInterval(function()
	{
		var a = $(".timeago");
		for(var i = 0; i < a.length ; i++){
			var elemento = document.getElementById( a[i].id );
			console.log(elemento.title);
			$('#'+a[i].id).text("" + humanTiming( elemento.title ) );
		}
	},40000);

	/*MÉTODOS CONSTRUCTORES*/

	/*SELECTORES*/

	$("#CargarNotificaciones").click(function(e)
	{
		$("#NotificacionesNuevas").append("");
		CargarNotificaciones();			
		e.preventDefault();
	});


	/*SELECTORES*/

/*
		

*/


	/*FUNCIONES Y PROCEDIMIENTOS*/

	function CargarNotificaciones(){

		var Notificaciones = $("#Notificacion"); 
		Global_idUltimaNotificacion = $("#idUltima").val();
		var user_id = $("#user_id").val();
		var route = "http://localhost:8000/cargarpops/"+Global_idUltimaNotificacion+"/"+user_id+"/todas";
		var Contador = 0;
			var route = "http://localhost:8000/cargarpops/"+Global_idUltimaNotificacion+"/"+user_id+"/todas";
			$.ajax({
				url: route,
				type: 'GET',
				dataType: 'json',
				cache: true,
				jsonpCallback: 'mantener',
				async: true,				
				success: function success(data, status) {
					if(Global_Control){mostrarCargando();}
					var ImagenPerfilEmpresa = "";					
					$(data).each(function(key,value){		

						var TimeAgo = value.created_at;
						Global_idUltimaNotificacion = value.id;		

						ImagenPerfilEmpresa = "/img/users/"+value.imagen_perfil_empresa;

						if (value.imagen_perfil_empresa === "" || value.imagen_perfil_empresa === null)
						{
							ImagenPerfilEmpresa = "https://image.freepik.com/iconos-gratis/silueta-usuario-masculino_318-35708.png";
						}

						if($.trim(value.tipo) === 'coins')
						{

							Notificaciones.append(
								"<div id='notificacion"+value.id+"' class='list-group'>"
									+"<div class='list-group-item'>"					
										+"<img src='img/yavu007.png' style='width: 32px; height: 30px;' />&nbsp;"		
										+value.contenido
									+"</div>"
									+"<div class='list-group-item-full panel-footer-small'>"	
										+"<small>"
											+"<span	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+humanTiming(TimeAgo)+"</span	>"
										+"</small>"		
									+"</div>"
								+"</div>"								
							);
						}
						else if($.trim(value.tipo) === 'activacion')
						{
								Notificaciones.append(
										"<div id='notificacion"+value.id+"' class='list-group'>"
											+"<div class='list-group-item'>"							
												+"<img src='img/yavu007.png' style='width: 32px; height: 32px;' />&nbsp;"	
												+value.contenido
											+"</div>"
											+"<div class='list-group-item-full panel-footer-small'>"	
												+"<small>"
													+"<span	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+humanTiming(TimeAgo)+"</span	>"
												+"</small>"		
											+"</div>"
										+"</div>"
								);
						}				
						else //if(value.tipo === 'coins')
						{
								Notificaciones.append(
										"<div id='notificacion"+value.id+"' class='list-group'>"
											+"<div class='list-group-item'>"							
												+value.contenido
											+"</div>"
											+"<div class='list-group-item-full panel-footer-small'>"	
												+"<small>"
													+"<span	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+humanTiming(TimeAgo)+"</span	>"
												+"</small>"		
											+"</div>"
										+"</div>"
								);
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
					Global_idUltimaNotificacion = value.id;
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
		console.log(nowTime);
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

	function limpiar(status)
	{

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

	function mostrarCargando()
	{
		$("#msj-estado").fadeIn(1000);
		return true;
	}

	function ocultarCargando()
	{
		$("#msj-estado").fadeOut();
		return true;
	}

	/*FUNCIONES Y PROCEDIMIENTOS*/
});