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
		HistorialCoins();
	/*MÉTODOS CONSTRUCTORES*/

	/*SELECTORES*/
	/*SELECTORES*/

	/*FUNCIONES Y PROCEDIMIENTOS*/
	function ContarCoins(){
		var CargarEstados = $("#CargarEstados"); 
		var route = "http://localhost:8000/contarcoins";
		var user_id = $("#user_id").val();
		
		$.get(route, function(res){
			$("#CantidadCoins").value = "";
			$(res).each(function(key,value){
				console.log(value.coins);
				if(parseInt(value.coins)>0){
					$("#CantidadCoins").append(formatNumber.new(value.coins, "$ "));	
				}
					//$("#CantidadCoins").html("<p>0</p>");	
			});
		});						
	}

	function HistorialCoins(){
		var route = "http://localhost:8000/historialcoins";
		var TotalCoins = 0;
		var Contador = 0;
		$.get(route, function(res){
			$(res).each(function(key,value){
				Contador += 1;
				TotalCoins += parseInt(value.cantidad);
				$("#HistorialCoins").append(
					'<div class="list-group-item">'
						+'<small>'
						+'<div style="float:right;"><img width="6%" height="3%" src="https://38.media.tumblr.com/9056c3040c618c65888244befef39321/tumblr_mhpc6eUvag1rrftcdo1_500.gif" /></div>'
						+'<div style=""><strong>Motivo</strong> '+value.motivo+'</div>'						
						+'<div><strong>Hace</strong> '+humanTiming(value.created_at)+'</div>'
						+'<div><strong>Cantidad</strong> '+formatNumber.new(value.cantidad,"$ ")+'</div>'
						+'</small>'
					+'</div>'						
				);
			});
			$("#FooterHistorialCoins").append(
				'<a href="#HistorialCoins"><div class="list-group-item list-group-item-info" style="text-align:right;">'
					+'<div"><strong>Movimientos </strong><small>('+Contador+' últimos movimientos)</small> <span class="text-success">'+formatNumber.new(TotalCoins, "$ ")+'</span></div>'				
				+'</div></a>'				
			);			
		});			 	
	}


	function humanTiming(time)
	{
		var now = new Date();
		var nowTime = now.getTime()
		nowTime = nowTime - Date.parse(time);
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

				if (tokens[i][1] === "día"){
					numberOfUnits = nowTime/(tokens[i-1][0])*10;
				}
				if(Math.floor(numberOfUnits) >= 7 && Math.floor(numberOfUnits) < 30){

				}else if(Math.floor(numberOfUnits) >= 7 && Math.floor(numberOfUnits) < 30){
					return " "+Math.floor(numberOfUnits/7)+" "+tokens[i+1][1]+((Math.floor(numberOfUnits/7)>1)?'s':'');

				}else if(Math.floor(numberOfUnits) >= 1 && Math.floor(numberOfUnits) < 7){
					return " "+Math.floor(numberOfUnits)+" "+tokens[i][1]+((Math.floor(numberOfUnits)>1)?'s':'');						

				}else if(Math.floor(numberOfUnits) < 1){

					if (numberOfUnits > 0.0416 ){
						return " "+Math.floor(24*numberOfUnits)+" "+tokens[i-1][1]+((Math.floor(24*numberOfUnits)>1)?'s':'');				

					}else if(numberOfUnits < 0.0416 && numberOfUnits > 0.000693333 ){
						numberOfUnits = Math.floor(((numberOfUnits*100)/4.)*60);
						return " "+numberOfUnits+" "+tokens[i-2][1]+((numberOfUnits>1)?'s':'');

					}else if(numberOfUnits < 0.000293333 ){
						return ' pocos minutos';

					}
				}	
			}else{				
				nowTime = Math.floor(nowTime/tokens[i][0]);				
			}
		}	    	
	}	
	/*FUNCIONES Y PROCEDIMIENTOS*/
});