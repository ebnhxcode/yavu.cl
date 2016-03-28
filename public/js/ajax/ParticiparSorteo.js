	$(document).ready(function(){	
	/*DECLARACIÓN DE VARIABLES GLOBALES*/
	/*DECLARACIÓN DE VARIABLES GLOBALES*/

	/*MÉTODOS CONSTRUCTORES*/
		VerificarTickets();
		/*
		setInterval(function()
		{
		},10000);
		*/
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
	$("#UsarTicket").click(function(){
		//console.log("hola estoy usando ticket, aun estoy pendiente");
		UsarTicket($(this).val());
		ContarTicketsEnSorteos();
		//console.log($(this).attr('value'));

	});	
	$(".participar").click(function(){
		$("#UsarTicket").val($(this).attr('value'));
		console.log($("#UsarTicket").val()+"/No");
		VerificarTickets();
		ContarTickets();

		//console.log($(this).attr('value')+"/");
	});
	$("#siquiero").click(function(){
		//console.log($("#user_id").val());
		CanjearTicket();
		UsarTicket($("#UsarTicket").val());
		ContarTicketsEnSorteos();

;	});
	$("#SortearGanador").click(function(){
		//console.log($(this).attr('value'));

		CargarDetallesSorteo($(this).attr('value'));


		return true;
	});
	/*SELECTORES*/

	/*FUNCIONES Y PROCEDIMIENTOS*/
		function CargarDetallesSorteo(sorteo_id)
		{

			$("#ModalGanadorSorteo").modal('show');
			var route = "http://localhost:8000/cargardetallessorteo/"+sorteo_id;
			$.ajax({
				url: route,
				//headers: {'X-CSRF-TOKEN': token},
				type: 'GET',
				dataType: 'json',
				success:function(data){
					var inicio, fin;
					$(data).each(function(key, index){

							if(key === 0){
								console.log(index.id);
								inicio = index.id;
							}else if(data.length === key + 1){
								console.log(index.id);
								fin = index.id;
							}

					});

					var tiempo = 10000;
					var t = 0;
					var a = setInterval(function(){
					var Ganador = 0;

						Ganador = aleatorio(inicio, fin);

						$("#Detalles").text("Número de ticket: "+Ganador);
							t = tiempo.toString();
							t = t.substring(0,1);

						$("#Tiempo").text("¡Empezó el sorteo! (Finaliza en : 	"+t+")");

						tiempo -= 50;
						if(tiempo === 1000){
							clearInterval(a);
							$("#Tiempo").text("¡¡¡ TIEMPO !!!");
							//console.log($("#Detalles").text());
							return MostrarGanador(Ganador);
						}
					}, 50 );
				}
			});

			return true;
		}

		function MostrarGanador(Ganador)
		{
			console.log("este es: "+Ganador);
			var route = "http://localhost:8000/mostrarganador/"+Ganador;
			$.ajax({
				url: route,
				type: 'GET',
				dataType: 'json',
				success:function(data){
					$(data).each(function(key,value){
						$("#Detalles").text("Número de opción: "+Ganador+" \n Ganador: "+value.nombre+" "+value.apellido);
					});
				}
			});
			return true;
		}

		function aleatorio(inferior,superior){


			var numPosibilidades = superior - inferior
			var aleat = Math.random() * numPosibilidades
			aleat = Math.round(aleat)
			return parseInt(inferior) + aleat


		}


		function CanjearTicket()
		{
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
					console.log(data);
					if(data !== 'Sin saldo para el servicio'){
						ContarCoins();
						ContarTickets();
					}else{
						$('#Mensaje').fadeIn().html(data);
						setInterval(function(){
							$('#Mensaje').fadeOut();
						}, 1500);
					}

				}
			});
			return true;
		}
		function ContarTicketsEnSorteos()
		{
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
						console.log(CantidadActual+"/"+data.length);
						CantidadTicketsPorSorteo.attr('value', data.length);

						if(CantidadActual < data.length){
							CantidadTicketsPorSorteo.fadeOut(function() {
								CantidadTicketsPorSorteo.text(data.length + "\n (Haz usado " + j + " tickets para este sorteo)").fadeIn();
							});
						}else{
							CantidadTicketsPorSorteo.text(data.length + "\n (Haz usado " + j + " tickets para este sorteo)");
						}

					}
				});

				//Tickets.push($(this).attr('value'));
			});


			return true;
		}
	function UsarTicket(sorteo_id)//Esto deberia insertar un ticket en negativo y dejarlo rendido para el sorteo correspondiente.
	{
		$('#myModal').modal('hide');
		var user_id = $("#user_id").val();	

		//este sorteo id hay que validarlo
		//var sorteo_id = $("#sorteo_id").val();
		console.log(sorteo_id);
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
	function VerificarTickets()
	{
		var user_id = $("#user_id").val();
		var route = "http://localhost:8000/verificartickets/"+user_id;
		$.get(route, function(res){
			console.log(res);
			if(res>0){
				$("#UsarTicket").removeAttr('style');	
			}
			else
			{
				$("#UsarTicket").fadeOut();
			}
		});
		return true;
	}
	function ContarCoins(){
		var route = "http://localhost:8000/contarcoins";
		var user_id = $("#user_id");
		$.get(route, function(res){
			$("#CantidadCoins").text("");
			$(res).each(function(key,value){
				//console.log(value.coins);
				if(parseInt(value.coins)>0){
					$("#CantidadCoins").text(formatNumber.new(value.coins, "$ "));	
				}
					//$("#CantidadCoins").html("<p>0</p>");	
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
				//console.log(value.coins);
				if(parseInt(value.tickets)>0){
					$("#CantidadTickets").text(formatNumber.new(value.tickets, "# "));	
				}
					//$("#CantidadCoins").html("<p>0</p>");	
			});
		});
		return true;
	}	
	/*FUNCIONES Y PROCEDIMIENTOS*/
});





