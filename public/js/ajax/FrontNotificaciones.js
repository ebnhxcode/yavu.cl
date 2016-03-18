	$(document).ready(function(){	
	/*DECLARACIÓN DE VARIABLES GLOBALES*/
	var Global_swap_notificaciones = true;
	var Global_swap_mensajes = true;
	var Global_idUltimaNotificacion;
	var Global_ContadorCargaNotificaciones;
	var Global_Control = true;
	/*DECLARACIÓN DE VARIABLES GLOBALES*/

	/*MÉTODOS CONSTRUCTORES*/
		ContarNotificaciones();
		setInterval(function(){
			ContarNotificaciones();
		},1000);
	/*MÉTODOS CONSTRUCTORES*/

	
	/*SELECTORES*/

  	$(function () {
  		var popover = $('[data-toggle="popover"]');
    	popover.popover({ html : true , trigger : 'manual'}); 

      $('#Notificaciones, #CantidadNotificaciones').bind('click',function(){

        CargarNotificaciones();
      });

      $('#Mensajes, #CantidadMensajes').bind('click',function(){

        CargarMensajes();

      });
  	})



	/*SELECTORES*/

	/*FUNCIONES Y PROCEDIMIENTOS*/
	function CargarNotificaciones()
	{
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

						pops +=	"<div class='list-group-item-hover'>"
									+"<div class='text-info' >"
										+"<img src='/img/yavu007.png' style='width: 32px; height: 30px;' />&nbsp;"		
										+value.contenido+"<br>"
										+"<small>"
											+"<span	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+humanTiming(TimeAgo)+"</span	>"
										+"</small>"	
									+"</div>"
								+"</div>";
					}
					else if($.trim(value.tipo) === 'activacion')
					{

						pops +=	"<div class='list-group-item-hover'>"
									+"<div class='text-info' >"
										+"<img src='/img/yavu007.png' style='width: 32px; height: 32px;' />&nbsp;"	
										+value.contenido+"<br>"
										+"<small>"
											+"<span	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+humanTiming(TimeAgo)+"</span	>"
										+"</small>"	
									+"</div>"
								+"</div>";
					}
					else
					{
						pops +=	"<div class='list-group-item-hover'>"
									+"<div class='text-info' >"
										+"<img src='/img/yavu007.png' style='width: 32px; height: 30px;' />&nbsp;"		
										+value.contenido+"<br>"
										+"<small>"
											+"<span	 class='timeago' id='timeago"+value.id+"' value='"+TimeAgo+"' title='"+TimeAgo+"\'>"+humanTiming(TimeAgo)+"</span	>"
										+"</small>"	
									+"</div>"
								+"</div>";						
					}

					Contador += 1;	
					//ContarInteracciones(value.id);
				});
				//$("#CantidadNotificaciones").text(Contador);
				console.log(Contador);
			var finalData = "<div class='list-group' style='overflow-y: scroll;height:200px;'>"
							+pops
							+"<div class='list-group-item'><a class='text-warning' href='/pops'>ver todas</a></div>"
							+"</div>";
			$('#Notificaciones').attr('data-content', finalData);
	    	


	    	

			if(Contador < 5){	
				//document.getElementById("idUltima").value = 0; //
				
				/*
				if (Global_Control) { 
					$("#msj-finPublicaciones").fadeIn();	
					setTimeout(function() {
					    $("#msj-finPublicaciones").fadeOut(3000);
					},1000);		
					Global_Control = false;	
				}		
				*/	
			}
			//ocultarCargando();	
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







			
		/*	
		var data = "";
			data +=	"<div class='list-group-item'><a class='text-info' href='#!'>Notificacion 1</a></div>";
			data += "<div class='list-group-item'><a class='text-info' href='#!'>Notificacion 2</a></div>";
			data += "<div class='list-group-item'><a class='text-info' href='#!'>Notificacion 3</a></div>";
			data += "<div class='list-group-item'><a class='text-info' href='#!'>Notificacion 4</a></div>";
			data += "<div class='list-group-item'><a class='text-info' href='#!'>Notificacion 5</a></div>";
			data += "<div class='list-group-item-full-header'><a class='text-warning' href='#!'>ver más</a></div>";
		*/
		return true;

	}
	function ContarNotificaciones()
	{
		var user_id = $("#user_id").val();
		var Contador = 0;
		$.ajax({
			url: "http://localhost:8000/cargarpops/"+$("#idUltimaNotificacion").val()+"/"+user_id+"/novistas",
			type: 'GET',
			dataType: 'json',
			cache: false,
			async: true,
			success: function success(data, status) {
				if (data > 0) {
          $("#Notificaciones").text(data);
          $("#Notificaciones").css('color','#F5A9A9');
        }else{
          $("#Notificaciones").text("");
          $("#Notificaciones").css('color','');
        }

			},
			error: function error(xhr, textStatus, errorThrown) {
			  //alert('Remote sever unavailable. Please try later');
			}
		});
		return true;
	}

	function CargarMensajes()
	{
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

	/*FUNCIONES Y PROCEDIMIENTOS*/
});