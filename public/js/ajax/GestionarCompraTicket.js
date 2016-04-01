$(document).ready(function(){	
/*DECLARACIÓN DE VARIABLES GLOBALES*/
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
/*DECLARACIÓN DE VARIABLES GLOBALES*/

/*MÉTODOS CONSTRUCTORES*/
	ContarTickets();
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
	$("#cantidadtickets").change(function(e){
		CalcularTotalCompra(this.value);
		e.preventDefault();
		return true;
	});

	$("#comprar").click(function(e){
		EfectuarCompra();
		e.preventDefault();
		return true;
	});

	$("#ComprarMasTickets").click(function(e){
		EfectuarCompra(1);
		VerificarTickets();
		e.preventDefault();
		return true;
	});
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function CalcularTotalCompra(cantidadtickets){
		$("#ValorCompra").text(formatNumber.new(cantidadtickets*100, "$ "));
		return true;
	}

	function EfectuarCompra(cantidadtickets){
		cantidadtickets = (cantidadtickets === undefined) ? $("#cantidadtickets").val() : cantidadtickets;
    if (cantidadtickets > 0){
			var user_id = $("#user_id").val();
			var token = $("#token").val();
			var route = "http://localhost:8000/efectuarcompraticket/"+user_id+"/"+cantidadtickets;
			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'GET',
				dataType: 'json',
				success:function(data){
          if (data === 'Sin saldo para el servicio'){
            $('#CantidadTickets').fadeIn().html(data);
          }else{
            if(data==='Exito'){$("#UsarTicket").fadeIn();}
            ContarCoins();
            ContarTickets();
          }
					return true;
				}
			});
		}
		return true;
	}

	function ContarCoins(){
		var route = "http://localhost:8000/contarcoins";
		var user_id = $("#user_id");
		$.get(route, function(res){
			$("#CantidadCoins").text("");
			$(res).each(function(key,value){
				if(parseInt(value.coins)>0){
					$("#CantidadCoins").text(formatNumber.new(value.coins, "$ "));	
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
				if(parseInt(value.tickets)>0){
					$("#CantidadTickets").text(formatNumber.new(value.tickets, "# "));	
				}
			});
		});
		return true;
	}

	function VerificarTickets(){
		var user_id = $("#user_id").val();
		var route = "http://localhost:8000/verificartickets/"+user_id;
		$.get(route, function(res){
			console.log(res);
			if(res>0){
				$(".UsarTicket").removeAttr('style');
			}else{
				$(".UsarTicket").fadeOut();
			}
		});
		return true;
	}
/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});