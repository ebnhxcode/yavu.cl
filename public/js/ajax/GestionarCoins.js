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
/*MÉTODOS CONSTRUCTORES*/

/*SELECTORES*/
    $('#Info').click(function(){
      $("#Info").popover('show');
      return true;
    });
/*SELECTORES*/

/*FUNCIONES Y PROCEDIMIENTOS*/
	function ContarCoins(){
		var CargarEstados = $("#CargarEstados"); 
		var route = "http://192.168.0.103/contarcoins";
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


/*FUNCIONES Y PROCEDIMIENTOS*/
	return true;
});