$(document).ready(function(){
/*DECLARACIÓN DE VARIABLES GLOBALES*/
	var Ejecutandose = true;
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	VerificarTickets();
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
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
	$(".participar").click(function(){
		VerificarTickets();
		ContarTickets();
		return true;
	});
	$("#siquiero").click(function(){
		CanjearTicket();
		ContarTicketsEnSorteos();
		VerificarTickets();
		ContarTickets();
		
		return true;
	});
	$("#SortearGanador").click(function(){
		if(Ejecutandose === true){
			Ejecutandose = false;
			CargarDetallesSorteo($(this).attr('value'));
		}else{
			$("#ModalGanadorSorteo").modal('show');
		}
		return true;
	});
	$(".UsarTicket").click(function(){
		UsarTicket($(this).val());
		ContarTicketsEnSorteos();
		VerificarTickets();
		ContarTickets();
		ContarNotificaciones();
		return true;
	});
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function CargarDetallesSorteo(sorteo_id){
		var route = "http://localhost:8000/cargardetallessorteo/"+sorteo_id;
		$.ajax({
			url: route,
			type: 'GET',
			dataType: 'json',
			success:function(data){
				if(data.length > 3){
					$("#ModalGanadorSorteo").modal('show');
					var inicio, fin;
					$(data).each(function(key, index){
						if(key === 0){
							inicio = index.id;
						}else if(data.length === key + 1){
							fin = index.id;
						}
						return true;
					});
					var tiempo = 100000;
					var t = 0;
					var Ganador = 0;
					var EjecucionSorteo = setInterval(function(){
						Ganador = aleatorio(inicio, fin);
						$("#Detalles").text("Número de ticket: "+Ganador);
						t = tiempo.toString();
						t = t.substring(0,1);
						$("#Tiempo").text("¡Empezó el sorteo! (Finaliza en : 	"+t+")");
						tiempo -= 50;
						if(tiempo === 10000){
							clearInterval(EjecucionSorteo);
							$("#Tiempo").text("¡¡¡ TIEMPO !!!");
							Ejecutandose = true;
							RegistrarParticipanteGanador(Ganador);
							MostrarGanador(Ganador);
						}
						return true;
					}, 5);
				}else{
					alert("Estimado cliente:\n\n Para poder realizar el sorteo, usted debe tener almenos 3 usuarios, actualmente tiene "+data.length);
				}
				return true;
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
	function MostrarGanador(Ganador){
		console.log("este es: "+Ganador);
		var route = "http://localhost:8000/mostrarganador/"+Ganador;
		$.ajax({
			url: route,
			type: 'GET',
			dataType: 'json',
			success:function(data){
				$(data).each(function(key, value){
					$("#Detalles").text("Número de opción: "+Ganador+" \n Ganador: "+value.nombre+" "+value.apellido);
				});
			}
		});
		return true;
	}

	function aleatorio(inferior, superior){
		var numPosibilidades = superior - inferior;
		var aleat = Math.random() * numPosibilidades;
		aleat = Math.round(aleat);
		return parseInt(inferior) + aleat;
	}

	function CanjearTicket(){
		$('#myModal').modal('hide');
		var user_id = $("#user_id").val();
		var route = "http://localhost:8000/canjearticket/"+user_id;
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'GET',
			dataType: 'json',
			data: {
				user_id: user_id,
			},
			success:function(data){
				if(data !== 'Sin saldo para el servicio'){
					ContarCoins();
					ContarTickets();
				}else{
					$('#Mensaje').fadeIn(100).html(data);
					setInterval(function(){
						$('#Mensaje').fadeOut(100);
					}, 1500);
				}
			}
		});
		return true;
	}

	function ContarTicketsEnSorteos(){
		var Tickets = [];
		$(".TicketsEnSorteo").each(function(){
			var CantidadTicketsPorSorteo = $(this);
			var CantidadActual = $(this).attr('value');
			CantidadActual = CantidadActual | 0;
			var route = "http://localhost:8000/contarticketsensorteo/"+$(this).attr('id');
			$.ajax({
				url: route,
				type: 'GET',
				dataType: 'json',
				cache: false,
				async: true,
				success:function(data){
					var j = 0;
					$(data).each(function(key, index){
						var user_id = $("#user_id");
						if(index.user_id === user_id.val()){
							j += 1;
						}
					});
					CantidadTicketsPorSorteo.attr('value', data.length);
					if(CantidadActual < data.length){
						CantidadTicketsPorSorteo.fadeOut(function(){
							CantidadTicketsPorSorteo.text(data.length + "\n (Haz usado " + j + " tickets para este sorteo)").fadeIn(50);
						});
					}else{
						if(data.length > 0){
							CantidadTicketsPorSorteo.text(data.length + "\n (Haz usado " + j + " tickets para este sorteo)");
						}else{
							CantidadTicketsPorSorteo.text(data.length);
						}
					}
				}
			});
		});
		return true;
	}

	//Esto deberia insertar un ticket en negativo y dejarlo rendido para el sorteo correspondiente.
	function UsarTicket(sorteo_id){
		$('#myModal').modal('hide');
		var user_id = $("#user_id").val();	
		var route = "http://localhost:8000/usarticket/"+user_id+"/"+sorteo_id;
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'GET',
			dataType: 'json',
			data: {
				user_id: user_id,
				sorteo_id: sorteo_id
			},
			success:function(){
			}
		});
		return true;
	}

	function RegistrarParticipanteGanador(Ganador){
		/*
		var route = "http://localhost:8000/registrarganadorsorteo/";
		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'GET',
			dataType: 'json',
			data: {
				user_id: user_id,
				sorteo_id: sorteo_id
			},
			success:function(){

			}
		});
		*/
		return true;
	}

	function VerificarTickets(){
		var user_id = $("#user_id").val();
		var route = "http://localhost:8000/verificartickets/"+user_id;
		$.get(route, function(res){
			if(res>0){
				$(".UsarTicket").removeAttr('style');
			}else{
				$(".UsarTicket").fadeOut(100);
			}
		});
		return true;
	}

	function ContarCoins(){
		var route = "http://localhost:8000/contarcoins";
		var user_id = $("#user_id");
		$.get(route, function(res){
			$(".CantidadCoins").text("");
			$(res).each(function(key,value){
				if(parseInt(value)>0){
					$(".CantidadCoins").text(formatNumber.new(value, "$ "));
				}
			});
		});
		return true;
	}

	function ContarTickets(){
		var route = "http://localhost:8000/contartickets";
		var user_id = $("#user_id");
		$.get(route, function(res){
			$("#CantidadTickets").text("");
			$(res).each(function(key,value){
				if(parseInt(value)>0){
					$("#CantidadTickets").text(formatNumber.new(value, "# "));
				}
			});
		});
		return true;
	}	
	/*FUNCIONES Y PROCEDIMIENTOS*/

	return true;
});





